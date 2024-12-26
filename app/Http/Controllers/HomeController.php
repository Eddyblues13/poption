<?php

namespace App\Http\Controllers;

use App\Models\Trade;
use Illuminate\Http\Request;
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('account.home');
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

        // Render the bank deposit page with amount
        return view('account.deposit-bank', [
            'amount' => $amount,
            'success' => session('success')
        ]);
    }

    // Method to handle crypto deposits
    public function cryptoDeposit(Request $request)
    {
        // Retrieve deposit details from query
        $method = $request->query('method');
        $amount = $request->query('amount');
        $walletAddress = $request->query('wallet_address');

        // Render the crypto deposit page with details
        return view('account.deposit-crypto', [
            'method' => $method,
            'amount' => $amount,
            'walletAddress' => $walletAddress,
            'success' => session('success')
        ]);
    }
}
