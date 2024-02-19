<?php

namespace App\Repositories;

use App\Models\Package;
use App\Repositories\Contracts\PackageRepository;
use Illuminate\Support\Collection;

class EloquentPackageRepository extends BaseRepository implements PackageRepository
{
    public function __construct(Package $model)
    {
        parent::__construct($model);
    }

    public function getAllPackages(): Collection
    {
        return $this
            ->model
            ->whereNotNull(['description', 'repository', 'downloads_total'])
            ->orderBy('name')
            ->get();
    }

    public function getAllDraftPackages(): Collection
    {
        return $this
            ->model
            ->orderBy('name')
            ->get();
    }

    public function updatePackage(int $id, array $attributes): void
    {
        $this
            ->model
            ->where('id', $id)
            ->update($attributes);
    }
}
