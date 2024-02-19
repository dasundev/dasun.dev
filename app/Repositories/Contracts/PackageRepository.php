<?php

namespace App\Repositories\Contracts;

use Illuminate\Support\Collection;

interface PackageRepository
{
    public function getAllPackages(): Collection;

    public function getAllDraftPackages(): Collection;

    public function updatePackage(int $id, array $attributes): void;
}
