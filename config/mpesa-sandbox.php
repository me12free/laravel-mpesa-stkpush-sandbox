<?php
// config/mpesa-sandbox.php
return [
    'consumer_key' => env('MPESA_CONSUMER_KEY'),
    'consumer_secret' => env('MPESA_CONSUMER_SECRET'),
    'shortcode' => env('MPESA_SHORTCODE', '174379'),
    'passkey' => env('MPESA_PASSKEY'),
    'callback_url' => env('MPESA_CALLBACK_URL'),
    'callback_secret' => env('MPESA_CALLBACK_SECRET'),
    'env' => env('APP_ENV', 'sandbox'),
];
