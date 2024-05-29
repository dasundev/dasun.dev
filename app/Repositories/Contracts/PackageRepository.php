<?php

namespace App\Repositories\Contracts;

use Illuminate\Support\Collection;

interface PackageRepository
{
    public function getOpenSourcePackages(): Collection;

    public function getPremiumPackages(): Collection;

    public function getPendingPackages(): Collection;

    public function updatePackage(int $id, array $attributes): void;
}
