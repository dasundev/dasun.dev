<?php

namespace App\Repositories;

use App\Models\License;
use App\Repositories\Contracts\LicenseRepository;
use Illuminate\Support\Collection;

class EloquentLicenseRepository implements LicenseRepository
{
    public function getLicenses(): Collection
    {
        return License::query()
            ->where('user_id', auth()->id())
            ->get();
    }
}
