<?php
// tests/TestCase.php

namespace Tests;

use Orchestra\Testbench\TestCase as OrchestraTestCase;

class TestCase extends OrchestraTestCase
{
    protected function getPackageProviders($app)
    {
        return [\MpesaSandbox\MpesaSandboxServiceProvider::class];
    }
}
