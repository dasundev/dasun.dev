<?php

namespace App\Console\Commands;

use App\Http\Integrations\GitHub\GitHubConnector;
use App\Http\Integrations\GitHub\Requests\ListRepositoryTags;
use App\Http\Integrations\Packagist\PackagistConnector;
use App\Http\Integrations\Packagist\Requests\GetPackageDataRequest;
use App\Models\Package;
use App\Repositories\Contracts\PackageRepository;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UpdatePackageTags extends Command
{
    protected $signature = 'package:update-tags';

    protected $description = 'Fetch and update all tags for packages from GitHub.';

    public function handle(): void
    {
        Package::all()->each(function ($package) {
            $connector = new GitHubConnector;

            $response = $connector->send(new ListRepositoryTags($package->composer_package));

            $tags = $response->collect()->map(function ($tag) {
                return [
                    'name' => $tag['name'],
                    'sha' => $tag['commit']['sha'],
                ];
            });

            $package->update(['tags' => $tags]);
        });
    }
}
