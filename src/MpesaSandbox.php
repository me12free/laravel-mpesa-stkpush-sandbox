<?php
// src/MpesaSandbox.php
namespace MpesaSandbox;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class MpesaSandbox
{
    public function initiateStkPush($phone, $amount)
    {
        $config = config('mpesa-sandbox');
        $timestamp = now()->format('YmdHis');
        $password = base64_encode($config['shortcode'] . $config['passkey'] . $timestamp);

        // Get access token
        $tokenResponse = Http::withBasicAuth($config['consumer_key'], $config['consumer_secret'])
            ->get('https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials');
        $accessToken = $tokenResponse['access_token'];

        // Prepare STK Push payload
        $payload = [
            'BusinessShortCode' => $config['shortcode'],
            'Password' => $password,
            'Timestamp' => $timestamp,
            'TransactionType' => 'CustomerPayBillOnline',
            'Amount' => $amount,
            'PartyA' => $phone,
            'PartyB' => $config['shortcode'],
            'PhoneNumber' => $phone,
            'CallBackURL' => $config['callback_url'],
            'AccountReference' => 'TestPayment',
            'TransactionDesc' => 'Sandbox Test Payment',
        ];

        // Send STK Push request
        $response = Http::withToken($accessToken)
            ->post('https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest', $payload);

        // Log for debugging (do not log sensitive info in production)
        Log::info('STK Push initiated', ['response' => $response->json()]);

        return $response->json();
    }
}
