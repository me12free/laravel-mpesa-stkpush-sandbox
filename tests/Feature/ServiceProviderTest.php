<?php

describe('MpesaSandbox service provider', function () {
    it('registers the MpesaSandbox singleton', function () {
        $instance = app(\MpesaSandbox\MpesaSandbox::class);
        expect($instance)->toBeInstanceOf(\MpesaSandbox\MpesaSandbox::class);
    });
});
