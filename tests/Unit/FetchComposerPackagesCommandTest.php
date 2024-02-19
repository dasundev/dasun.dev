<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;

uses(DatabaseMigrations::class);

test('fetch packages from packagist', function () {
    $this->artisan('composer:fetch-packages')->assertExitCode(0);
});
