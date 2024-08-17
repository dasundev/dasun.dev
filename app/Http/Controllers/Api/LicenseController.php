<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Integrations\GitHub\GitHubConnector;
use App\Http\Integrations\GitHub\Requests\ListRepositoryTags;
use App\Models\Package;
use App\Models\User;
use App\Services\GitHub;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LicenseController extends Controller
{
    /**
     * Store a new license.
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Saloon\Exceptions\Request\FatalRequestException
     * @throws \Saloon\Exceptions\Request\RequestException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'license' => ['required', 'string', 'max:255'],
            'purchasable_type' => ['required', 'string', 'max:255'],
            'purchasable_id' => ['required', 'string', 'max:255'],
            'expires_at' => ['required', 'date', 'after:today'],
        ]);

        $user = User::whereEmail($request->email)->firstOrCreate(
            [
                'name' => $request->name,
                'email' => $request->email,
            ],
            [
                'password' => Str::password(),
            ]
        );

        if (! class_exists($request->purchasable_type)) {
            return response('The purchasable type is not valid.', 422);
        }

        // Find the purchasable instance.
        $purchasable = ($request->purchasable_type)::find($request->purchasable_id);

        if (! $purchasable->exists()) {
            return response('The purchasable item could not be found.', 404);
        }

        $license = $user->licenses()->create([
            'name' => $request->license,
            'purchasable_type' => $request->purchasable_type,
            'purchasable_id' => $request->purchasable_id,
            'key' => Str::uuid(),
            'expires_at' => $request->expires_at,
        ]);

        if ($purchasable instanceof Package) {
            $version = GitHub::fetchRepositoryTags($purchasable->composer_package)->first();

            $license->update([
                'fallback_version' => $version,
            ]);
        }

        return response('License issued successfully.', 200);
    }

    /**
     * Fetch the latest version information for the given package from GitHub.
     *
     * @return array
     *
     * @throws \Saloon\Exceptions\Request\FatalRequestException
     * @throws \Saloon\Exceptions\Request\RequestException
     */
    private function fetchLatestPurchasableVersion(Package $package)
    {
        $connector = new GitHubConnector;

        $response = $connector->send(new ListRepositoryTags($package->composer_package));

        $tags = $response->collect();

        $latestTag = $tags->first();

        return [
            'name' => $latestTag['name'],
            'sha' => $latestTag['commit']['sha'],
        ];
    }
}
