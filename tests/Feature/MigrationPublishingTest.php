<?php

describe('MpesaSandbox migration publishing', function () {
    it('publishes the migration directory', function () {
        $provider = new \MpesaSandbox\MpesaSandboxServiceProvider(app());
        $provider->boot();
        $publishes = \Illuminate\Support\ServiceProvider::pathsToPublish(\MpesaSandbox\MpesaSandboxServiceProvider::class, 'migrations');
        expect($publishes)->not->toBeEmpty();
        $migrationDir = array_values($publishes)[0];
        expect(is_dir($migrationDir) || str_contains($migrationDir, 'migrations'))->toBeTrue();
    });
});
