<?php

test('it can instantiate the MpesaSandbox class', function () {
    $mpesa = app(\MpesaSandbox\MpesaSandbox::class);
    expect($mpesa)->toBeInstanceOf(\MpesaSandbox\MpesaSandbox::class);
});
