<?php

describe('MpesaSandbox config publishing', function () {
    it('publishes the config file', function () {
        $provider = new \MpesaSandbox\MpesaSandboxServiceProvider(app());
        $provider->boot();
        $publishes = \Illuminate\Support\ServiceProvider::pathsToPublish(\MpesaSandbox\MpesaSandboxServiceProvider::class, 'config');
        expect($publishes)->not->toBeEmpty();
        expect(array_key_first($publishes))->toContain('mpesa-sandbox.php');
    });
});
