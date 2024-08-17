<?php

namespace App\Console\Commands;

use App\Http\Integrations\Packagist\PackagistConnector;
use App\Http\Integrations\Packagist\Requests\GetPackageDataRequest;
use App\Repositories\Contracts\PackageRepository;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UpdatePackageStats extends Command
{
    protected $signature = 'package:update-stats';

    protected $description = 'Fetch and update data for all packages from Packagist.';

    public function handle(): void
    {
        $packageRepository = app(PackageRepository::class);

        $packages = $packageRepository->getPendingPackages();

        $packagist = new PackagistConnector;

        foreach ($packages as $package) {
            DB::transaction(function () use ($packagist, $package, $packageRepository) {
                $response = $packagist->send(new GetPackageDataRequest(Str::replace('dasundev/', '', $package->composer_package)));

                $data = $response->json();

                $attributes = [
                    'name' => $data['package']['name'],
                    'description' => $data['package']['description'],
                    'downloads_total' => $data['package']['downloads']['total'],
                    'github_stars' => $data['package']['github_stars'],
                    'repository' => $data['package']['repository'],
                ];

                $packageRepository->updatePackage($package->id, $attributes);
            });
        }
    }
}
