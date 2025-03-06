<?php

declare(strict_types=1);

use App\Console\Commands\SyncPackagist;

test('sync packages', function () {
    $this->artisan(SyncPackagist::class)
        ->assertExitCode(0);
});
