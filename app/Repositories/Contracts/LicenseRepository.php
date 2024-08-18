<?php

declare(strict_types=1);

namespace App\Repositories\Contracts;

use Illuminate\Support\Collection;

interface LicenseRepository
{
    public function getLicenses(): Collection;
}
