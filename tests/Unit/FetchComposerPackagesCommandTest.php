<?php

test('fetch packages from packagist', function () {
    $this->artisan('composer:fetch-packages')->assertExitCode(0);
});
