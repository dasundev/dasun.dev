<?php

namespace App\Console\Commands;

use App\Http\Integrations\GitHub\GitHubConnector;
use App\Http\Integrations\GitHub\Requests\ListRepositoryTags;
use App\Models\Package;
use App\Services\GitHub;
use Illuminate\Console\Command;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;

class UpdatePackageTags extends Command
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
            $tags = GitHub::fetchRepositoryTags($package);

            $package->update(['tags' => $tags]);
        });
    }
}
