<?php

namespace App\Repositories;

use App\Models\Package;
use App\Repositories\Contracts\PackageRepository;
use Illuminate\Support\Collection;

class EloquentPackageRepository implements PackageRepository
{
    public function getAllPackages(): Collection
    {
        return Package::whereNotNull([
                'description',
                'repository',
                'downloads_total'
            ])
            ->orderBy('name', 'asc')
            ->orderBy('downloads_total', 'desc')
            ->get();
    }

    public function getAllDraftPackages(): Collection
    {
        return Package::orderBy('name')
            ->get();
    }

    public function updatePackage(int $id, array $attributes): void
    {
        Package::where('id', $id)
            ->update($attributes);
    }
}
