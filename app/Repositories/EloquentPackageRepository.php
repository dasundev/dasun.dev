<?php

namespace App\Repositories;

use App\Models\Package;
use App\Repositories\Contracts\PackageRepository;
use Illuminate\Support\Collection;

class EloquentPackageRepository implements PackageRepository
{
    public function getOpenSourcePackages(): Collection
    {
        return Package::openSource()
            ->whereNotNull(['description', 'repository', 'downloads_total'])
            ->orderBy('downloads_total', 'desc')
            ->get();
    }

    public function getPremiumPackages(): Collection
    {
        return Package::premium()->get();
    }

    public function getPendingPackages(): Collection
    {
        return Package::openSource()
            ->orderBy('composer_package')
            ->get();
    }

    public function updatePackage(int $id, array $attributes): void
    {
        Package::where('id', $id)
            ->update($attributes);
    }
}
