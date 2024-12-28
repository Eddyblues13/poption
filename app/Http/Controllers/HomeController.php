<?php

namespace App\Http\Controllers;

use App\Models\Trade;
use Illuminate\Http\Request;
use App\Models\AccountBalance;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function welcome()
    {
        return view('account.welcome');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Sum of account balance
        $data['balance_sum'] = AccountBalance::where('user_id', Auth::user()->id)
            ->sum('amount');
        return view('account.home', $data);
    }


    public function saveCurrency(Request $request)
    {
        // Validate the request data to ensure currency is provided
        $request->validate([
            'currency' => 'required|string'
        ]);

        // Get the authenticated user
        $user = Auth::user();

        // Save the selected currency to the user's profile in the database
        $user->currency = $request->currency;
        $user->save();

        // Respond with JSON indicating success
        return response()->json(['success' => true]);
    }

    // Save the selected country to session
    public function saveCountry(Request $request)
    {
        $request->validate([
            'country' => 'required|string'
        ]);
        // Get the authenticated user
        $user = Auth::user();

        // Save the selected currency to the user's profile in the database
        $user->country = $request->country;
        $user->save();

        // Respond with JSON indicating success
        return response()->json(['success' => true]);
    }



    public function profile()
    {
        return view('account.profile');
    }

    public function withdrawal()
    {
        return view('account.withdrawal');
    }

    public function trade(Request $request)
    {
        $validated = $request->validate([
            'action' => 'required|string|in:buy,sell,ai',
            'amount' => 'required|numeric|min:1',
        ]);

        $trade = Trade::create([
            'user_id' => Auth::id(),
            'action' => $validated['action'],
            'amount' => $validated['amount'],
            'payout' => $validated['amount'] * 1.67, // Example calculation
            'profit' => ($validated['amount'] * 0.67), // Example calculation
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Trade has been initiated successfully!');
    }


    public function depositPage(Request $request)
    {
        // Validate the input
        $validated = $request->validate([
            'deposit_method' => 'required|string',
            'amount' => 'required|numeric|min:1',
            'promo_code' => 'nullable|string',
        ]);

        // Process the deposit logic here
        // Example: Save deposit details to the database (you can customize this)
        // Deposit::create($validated);
        switch ($validated['deposit_method']) {
            case 'bank_transfer':
                return redirect()->route('bank.deposit')->with([
                    'success' => 'Proceed with Bank Transfer',
                    'amount' => $validated['amount']
                ]);
            case 'bitcoin':
                return redirect()->route('crypto.deposit', [
                    'method' => 'bitcoin',
                    'amount' => $validated['amount'],
                    'wallet_address' => 'your-bitcoin-wallet-address-here'
                ])->with('success', 'Proceed with Bitcoin Deposit');
            case 'ethereum':
                return redirect()->route('crypto.deposit', [
                    'method' => 'ethereum',
                    'amount' => $validated['amount'],
                    'wallet_address' => 'your-ethereum-wallet-address-here'
                ])->with('success', 'Proceed with Ethereum Deposit');
            case 'litecoin':
                return redirect()->route('crypto.deposit', [
                    'method' => 'litecoin',
                    'amount' => $validated['amount'],
                    'wallet_address' => 'your-litecoin-wallet-address-here'
                ])->with('success', 'Proceed with Litecoin Deposit');
            case 'usdt':
                return redirect()->route('crypto.deposit', [
                    'method' => 'usdt',
                    'amount' => $validated['amount'],
                    'wallet_address' => 'your-usdt-wallet-address-here'
                ])->with('success', 'Proceed with USDT Deposit');
            default:
                return redirect()->back()->with('error', 'Invalid deposit method');
        }
    }

    // Method to handle bank deposit
    public function bankDeposit(Request $request)
    {
        // Retrieve amount from session or query
        $amount = session('amount') ?? $request->query('amount');

        // Full mapping of world currency codes to symbols
        $currencyMap = [
            'AED' => 'د.إ',
            'AFN' => '؋',
            'ALL' => 'L',
            'AMD' => '֏',
            'ANG' => 'ƒ',
            'AOA' => 'Kz',
            'ARS' => '$',
            'AUD' => '$',
            'AWG' => 'ƒ',
            'AZN' => '₼',
            'BAM' => 'KM',
            'BBD' => '$',
            'BDT' => '৳',
            'BGN' => 'лв',
            'BHD' => '.د.ب',
            'BIF' => 'FBu',
            'BMD' => '$',
            'BND' => '$',
            'BOB' => 'Bs.',
            'BRL' => 'R$',
            'BSD' => '$',
            'BTN' => 'Nu.',
            'BWP' => 'P',
            'BYN' => 'Br',
            'BZD' => '$',
            'CAD' => '$',
            'CDF' => 'FC',
            'CHF' => 'CHF',
            'CLP' => '$',
            'CNY' => '¥',
            'COP' => '$',
            'CRC' => '₡',
            'CUP' => '$',
            'CVE' => 'Esc',
            'CZK' => 'Kč',
            'DJF' => 'Fdj',
            'DKK' => 'kr',
            'DOP' => '$',
            'DZD' => 'د.ج',
            'EGP' => '£',
            'ERN' => 'Nfk',
            'ETB' => 'Br',
            'EUR' => '€',
            'FJD' => '$',
            'FKP' => '£',
            'FOK' => 'kr',
            'GBP' => '£',
            'GEL' => '₾',
            'GGP' => '£',
            'GHS' => '₵',
            'GIP' => '£',
            'GMD' => 'D',
            'GNF' => 'FG',
            'GTQ' => 'Q',
            'GYD' => '$',
            'HKD' => '$',
            'HNL' => 'L',
            'HRK' => 'kn',
            'HTG' => 'G',
            'HUF' => 'Ft',
            'IDR' => 'Rp',
            'ILS' => '₪',
            'IMP' => '£',
            'INR' => '₹',
            'IQD' => 'ع.د',
            'IRR' => '﷼',
            'ISK' => 'kr',
            'JEP' => '£',
            'JMD' => '$',
            'JOD' => 'د.ا',
            'JPY' => '¥',
            'KES' => 'KSh',
            'KGS' => 'с',
            'KHR' => '៛',
            'KID' => '$',
            'KMF' => 'CF',
            'KRW' => '₩',
            'KWD' => 'د.ك',
            'KYD' => '$',
            'KZT' => '₸',
            'LAK' => '₭',
            'LBP' => 'ل.ل',
            'LKR' => 'Rs',
            'LRD' => '$',
            'LSL' => 'L',
            'LYD' => 'ل.د',
            'MAD' => 'د.م.',
            'MDL' => 'L',
            'MGA' => 'Ar',
            'MKD' => 'ден',
            'MMK' => 'K',
            'MNT' => '₮',
            'MOP' => 'MOP$',
            'MRU' => 'UM',
            'MUR' => '₨',
            'MVR' => '.ރ',
            'MWK' => 'MK',
            'MXN' => '$',
            'MYR' => 'RM',
            'MZN' => 'MT',
            'NAD' => '$',
            'NGN' => '₦',
            'NIO' => 'C$',
            'NOK' => 'kr',
            'NPR' => '₨',
            'NZD' => '$',
            'OMR' => 'ر.ع.',
            'PAB' => 'B/.',
            'PEN' => 'S/',
            'PGK' => 'K',
            'PHP' => '₱',
            'PKR' => '₨',
            'PLN' => 'zł',
            'PYG' => '₲',
            'QAR' => 'ر.ق',
            'RON' => 'lei',
            'RSD' => 'дин.',
            'RUB' => '₽',
            'RWF' => 'FRw',
            'SAR' => '﷼',
            'SBD' => '$',
            'SCR' => '₨',
            'SDG' => 'ج.س.',
            'SEK' => 'kr',
            'SGD' => '$',
            'SHP' => '£',
            'SLE' => 'Le',
            'SLL' => 'Le',
            'SOS' => 'Sh',
            'SRD' => '$',
            'SSP' => '£',
            'STN' => 'Db',
            'SYP' => '£',
            'SZL' => 'L',
            'THB' => '฿',
            'TJS' => 'ЅМ',
            'TMT' => 'm',
            'TND' => 'د.ت',
            'TOP' => 'T$',
            'TRY' => '₺',
            'TTD' => '$',
            'TVD' => '$',
            'TWD' => 'NT$',
            'TZS' => 'TSh',
            'UAH' => '₴',
            'UGX' => 'USh',
            'USD' => '$',
            'UYU' => '$U',
            'UZS' => 'сўм',
            'VES' => 'Bs.',
            'VND' => '₫',
            'VUV' => 'VT',
            'WST' => 'T',
            'XAF' => 'FCFA',
            'XCD' => '$',
            'XOF' => 'CFA',
            'XPF' => '₣',
            'YER' => '﷼',
            'ZAR' => 'R',
            'ZMW' => 'ZK',
            'ZWL' => '$'
        ];

        $currencyCode = Auth::user()->currency;

        // Render the bank deposit page with amount
        return view('account.deposit-bank', [
            'amount' => $amount,
            'success' => session('success'),
            'currencyMap' => $currencyMap,
            'currencyCode' => $currencyCode,
        ]);
    }



    // Method to handle crypto deposits
    public function cryptoDeposit(Request $request)
    {
        // Retrieve deposit details from query
        $method = $request->query('method');
        $amount = $request->query('amount');
        $walletAddress = $request->query('wallet_address');


        // Full mapping of world currency codes to symbols
        $currencyMap = [
            'AED' => 'د.إ',
            'AFN' => '؋',
            'ALL' => 'L',
            'AMD' => '֏',
            'ANG' => 'ƒ',
            'AOA' => 'Kz',
            'ARS' => '$',
            'AUD' => '$',
            'AWG' => 'ƒ',
            'AZN' => '₼',
            'BAM' => 'KM',
            'BBD' => '$',
            'BDT' => '৳',
            'BGN' => 'лв',
            'BHD' => '.د.ب',
            'BIF' => 'FBu',
            'BMD' => '$',
            'BND' => '$',
            'BOB' => 'Bs.',
            'BRL' => 'R$',
            'BSD' => '$',
            'BTN' => 'Nu.',
            'BWP' => 'P',
            'BYN' => 'Br',
            'BZD' => '$',
            'CAD' => '$',
            'CDF' => 'FC',
            'CHF' => 'CHF',
            'CLP' => '$',
            'CNY' => '¥',
            'COP' => '$',
            'CRC' => '₡',
            'CUP' => '$',
            'CVE' => 'Esc',
            'CZK' => 'Kč',
            'DJF' => 'Fdj',
            'DKK' => 'kr',
            'DOP' => '$',
            'DZD' => 'د.ج',
            'EGP' => '£',
            'ERN' => 'Nfk',
            'ETB' => 'Br',
            'EUR' => '€',
            'FJD' => '$',
            'FKP' => '£',
            'FOK' => 'kr',
            'GBP' => '£',
            'GEL' => '₾',
            'GGP' => '£',
            'GHS' => '₵',
            'GIP' => '£',
            'GMD' => 'D',
            'GNF' => 'FG',
            'GTQ' => 'Q',
            'GYD' => '$',
            'HKD' => '$',
            'HNL' => 'L',
            'HRK' => 'kn',
            'HTG' => 'G',
            'HUF' => 'Ft',
            'IDR' => 'Rp',
            'ILS' => '₪',
            'IMP' => '£',
            'INR' => '₹',
            'IQD' => 'ع.د',
            'IRR' => '﷼',
            'ISK' => 'kr',
            'JEP' => '£',
            'JMD' => '$',
            'JOD' => 'د.ا',
            'JPY' => '¥',
            'KES' => 'KSh',
            'KGS' => 'с',
            'KHR' => '៛',
            'KID' => '$',
            'KMF' => 'CF',
            'KRW' => '₩',
            'KWD' => 'د.ك',
            'KYD' => '$',
            'KZT' => '₸',
            'LAK' => '₭',
            'LBP' => 'ل.ل',
            'LKR' => 'Rs',
            'LRD' => '$',
            'LSL' => 'L',
            'LYD' => 'ل.د',
            'MAD' => 'د.م.',
            'MDL' => 'L',
            'MGA' => 'Ar',
            'MKD' => 'ден',
            'MMK' => 'K',
            'MNT' => '₮',
            'MOP' => 'MOP$',
            'MRU' => 'UM',
            'MUR' => '₨',
            'MVR' => '.ރ',
            'MWK' => 'MK',
            'MXN' => '$',
            'MYR' => 'RM',
            'MZN' => 'MT',
            'NAD' => '$',
            'NGN' => '₦',
            'NIO' => 'C$',
            'NOK' => 'kr',
            'NPR' => '₨',
            'NZD' => '$',
            'OMR' => 'ر.ع.',
            'PAB' => 'B/.',
            'PEN' => 'S/',
            'PGK' => 'K',
            'PHP' => '₱',
            'PKR' => '₨',
            'PLN' => 'zł',
            'PYG' => '₲',
            'QAR' => 'ر.ق',
            'RON' => 'lei',
            'RSD' => 'дин.',
            'RUB' => '₽',
            'RWF' => 'FRw',
            'SAR' => '﷼',
            'SBD' => '$',
            'SCR' => '₨',
            'SDG' => 'ج.س.',
            'SEK' => 'kr',
            'SGD' => '$',
            'SHP' => '£',
            'SLE' => 'Le',
            'SLL' => 'Le',
            'SOS' => 'Sh',
            'SRD' => '$',
            'SSP' => '£',
            'STN' => 'Db',
            'SYP' => '£',
            'SZL' => 'L',
            'THB' => '฿',
            'TJS' => 'ЅМ',
            'TMT' => 'm',
            'TND' => 'د.ت',
            'TOP' => 'T$',
            'TRY' => '₺',
            'TTD' => '$',
            'TVD' => '$',
            'TWD' => 'NT$',
            'TZS' => 'TSh',
            'UAH' => '₴',
            'UGX' => 'USh',
            'USD' => '$',
            'UYU' => '$U',
            'UZS' => 'сўм',
            'VES' => 'Bs.',
            'VND' => '₫',
            'VUV' => 'VT',
            'WST' => 'T',
            'XAF' => 'FCFA',
            'XCD' => '$',
            'XOF' => 'CFA',
            'XPF' => '₣',
            'YER' => '﷼',
            'ZAR' => 'R',
            'ZMW' => 'ZK',
            'ZWL' => '$'
        ];

        $currencyCode = Auth::user()->currency;

        // Render the crypto deposit page with details
        return view('account.deposit-crypto', [
            'method' => $method,
            'amount' => $amount,
            'walletAddress' => $walletAddress,
            'currencyMap' => $currencyMap,
            'currencyCode' => $currencyCode,
            'success' => session('success')
        ]);
    }

    public function submitCryptoDeposit(Request $request)
    {
        $data = $request->all();
        return view('account.deposit-crypto-2', compact('data'));
    }


    public function UserLogout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('status', 'You have been logged out successfully.');
    }
}
