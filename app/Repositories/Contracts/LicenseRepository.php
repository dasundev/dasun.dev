<?php

namespace App\Repositories\Contracts;

use Illuminate\Support\Collection;

interface LicenseRepository
{
    public function getLicenses(): Collection;
}
