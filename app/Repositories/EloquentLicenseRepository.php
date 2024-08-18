<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\License;
use App\Repositories\Contracts\LicenseRepository;
use Illuminate\Support\Collection;

final class EloquentLicenseRepository implements LicenseRepository
{
    public function getLicenses(): Collection
    {
        return License::query()
            ->where('user_id', auth()->id())
            ->get();
    }
}
