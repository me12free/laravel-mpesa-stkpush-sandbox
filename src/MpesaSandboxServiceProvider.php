<?php
// src/MpesaSandboxServiceProvider.php
namespace MpesaSandbox;

use Illuminate\Support\ServiceProvider;

class MpesaSandboxServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Publish config
        $this->publishes([
            __DIR__.'/../config/mpesa-sandbox.php' => config_path('mpesa-sandbox.php'),
        ], 'config');
        // Publish migrations
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../database/migrations/' => database_path('migrations'),
            ], 'migrations');
        }
    }

    public function register()
    {
        // Merge config
        $this->mergeConfigFrom(
            __DIR__.'/../config/mpesa-sandbox.php', 'mpesa-sandbox'
        );
        // Bind main class
        $this->app->singleton(MpesaSandbox::class, function ($app) {
            return new MpesaSandbox();
        });
    }
}
