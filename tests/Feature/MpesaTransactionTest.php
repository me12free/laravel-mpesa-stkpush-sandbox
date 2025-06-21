<?php
// tests/Feature/MpesaTransactionTest.php

describe('MpesaSandbox migrations', function () {
    it('runs the mpesa_transactions migration', function () {
        // Set up in-memory SQLite for testing
        config(['database.default' => 'sqlite']);
        config(['database.connections.sqlite.database' => ':memory:']);
        \Illuminate\Support\Facades\Artisan::call('migrate', ['--path' => __DIR__.'/../../database/migrations', '--realpath' => true]);
        expect(\Illuminate\Support\Facades\Schema::hasTable('mpesa_transactions'))->toBeTrue();
    });
});
