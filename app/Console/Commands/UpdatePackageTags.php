<?php

namespace App\Console\Commands;

use App\Http\Integrations\GitHub\GitHubConnector;
use App\Http\Integrations\GitHub\Requests\ListRepositoryTags;
use App\Models\Package;
use Illuminate\Console\Command;

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
