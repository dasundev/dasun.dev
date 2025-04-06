<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Models\Package;
use App\Services\Packagist;
use Illuminate\Console\Command;

final class SyncPackagist extends Command
{
    protected $signature = 'sync:packagist';

    protected $description = 'Sync composer packages';

    public function handle(): void
    {
        $packages = Package::all();

        foreach ($packages as $package) {
            $stats = Packagist::getPackageWithStats($package->identifier);

            if ($stats) {
                $package->update($stats);
            }
        }
    }
}
