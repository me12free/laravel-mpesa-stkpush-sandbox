<?php

describe('MpesaSandbox STK Push', function () {
    beforeEach(function () {
        // Mock HTTP and config
        \Illuminate\Support\Facades\Http::fake([
            'https://sandbox.safaricom.co.ke/oauth/v1/generate*' => \Illuminate\Support\Facades\Http::response(['access_token' => 'test_token']),
            'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest' => \Illuminate\Support\Facades\Http::response(['ResponseCode' => '0', 'ResponseDescription' => 'Success']),
        ]);
        config([
            'mpesa-sandbox.consumer_key' => 'key',
            'mpesa-sandbox.consumer_secret' => 'secret',
            'mpesa-sandbox.shortcode' => '174379',
            'mpesa-sandbox.passkey' => 'pass',
            'mpesa-sandbox.callback_url' => 'https://test/callback',
        ]);
    });

    it('can initiate an STK Push', function () {
        $mpesa = app(\MpesaSandbox\MpesaSandbox::class);
        $result = $mpesa->initiateStkPush('254700000000', 100);
        expect($result['ResponseCode'])->toBe('0');
        expect($result['ResponseDescription'])->toBe('Success');
    });
});
