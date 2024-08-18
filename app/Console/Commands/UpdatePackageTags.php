<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Models\Package;
use App\Services\GitHub;
use Illuminate\Console\Command;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;

final class UpdatePackageTags extends Command
{
    protected $signature = 'package:update-tags';

    protected $description = 'Fetch and update all tags for packages from GitHub.';

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function handle(): void
    {
        Package::all()->each(function ($package) {
            $package->update(['tags' => GitHub::fetchAllRepositoryTags($package)]);
        });
    }
}
