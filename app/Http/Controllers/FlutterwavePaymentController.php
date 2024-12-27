<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class FlutterwavePaymentController extends Controller
{
    public function index()
    {
        return view('flutterwave.payment');
    }

    public function initiatePayment(Request $request)
    {
        // Generate a unique transaction reference as a string
        $transactionRef = 'TX_' . uniqid();

        // Prepare the data for the Flutterwave API
        $paymentData = [
            'tx_ref' => $transactionRef,
            'amount' => $request->amount,
            'currency' => 'NGN', // Or any supported currency
            'redirect_url' => route('flutterwave.callback'),
            'customer' => [
                'email' => $request->email,
                'name' => $request->name,
            ],
            'payment_options' => 'card', // You can add other payment methods here
            'meta' => [
                'consumer_id' => 'unique_consumer_id', // You can use user metadata here
                'consumer_mac' => 'unique_mac_address', // You can use user metadata here
            ],
        ];

        // Redirect the user to the Flutterwave payment page
        $paymentURL = $this->createFlutterwavePaymentLink($paymentData);
        return redirect($paymentURL);
    }

    // Method to create payment link using Guzzle
    private function createFlutterwavePaymentLink($data)
    {
        $client = new Client();
        $url = 'https://api.flutterwave.com/v3/payments';

        $response = $client->post($url, [
            'headers' => [
                'Authorization' => 'Bearer ' . config('services.flutterwave.secret_key'),
                'Content-Type' => 'application/json',
            ],
            'json' => $data,
        ]);

        $body = json_decode($response->getBody(), true);

        if ($body['status'] == 'success') {
            return $body['data']['link'];
        }

        return back()->with('error', 'Error initiating payment.');
    }

    public function handleCallback(Request $request)
    {
        $transactionID = $request->transaction_id;

        // Verify the payment
        $verificationResponse = $this->verifyPayment($transactionID);

        if ($verificationResponse['status'] === 'success') {
            // Payment was successful, handle post-payment actions (e.g., updating database)
            return view('flutterwave.success');
        }

        return view('flutterwave.error');
    }

    // Method to verify payment using Guzzle
    private function verifyPayment($transactionID)
    {
        $client = new Client();
        $url = "https://api.flutterwave.com/v3/transactions/{$transactionID}/verify";

        $response = $client->get($url, [
            'headers' => [
                'Authorization' => 'Bearer ' . config('services.flutterwave.secret_key'),
                'Content-Type' => 'application/json',
            ],
        ]);

        return json_decode($response->getBody(), true);
    }
}
