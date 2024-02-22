<?php

namespace App\Repositories\Contracts;

use Illuminate\Support\Collection;

interface PackageRepository
{
    public function getPackages(): Collection;

    public function getPendingPackages(): Collection;

    public function updatePackage(int $id, array $attributes): void;
}
