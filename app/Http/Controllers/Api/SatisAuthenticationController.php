<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Models\License;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;

final class SatisAuthenticationController
{
    public function __invoke(Authenticatable $license, Request $request)
    {
        /** @var $license License */
        if (! $license instanceof License) {
            abort(401);
        }

        // Validate that the request's user matches the license owner
        if ($license->user->email !== $request->getUser()) {
            abort(401, "The requested user doesn't have access to this license.");
        }

        $package = $this->getRequestedPackage($request);

        // Check if the user has a valid, non-expired license for the requested package
        $hasAccess = License::query()
            ->where('user_id', $license->user_id)
            ->get()
            ->contains(
                fn (License $license) => $license->hasLicenseAccess($package)
            );

        abort_unless($hasAccess, 401, 'The requested license could not be used for the requested package or version.');

        return response('valid');
    }

    private function getRequestedPackage(Request $request): array
    {
        $originalUrl = $request->header('X-Original-URI', '');

        preg_match('#/dist/(?<package>[^/]+/[^/]*)/[^/]+-[^/]*-(?<sha>[a-f0-9]{40})#', $originalUrl, $matches);

        if (! array_key_exists('package', $matches) || ! array_key_exists('sha', $matches)) {
            abort(401, 'Missing or invalid X-Original-URI header');
        }

        return [
            'name' => $matches['package'],
            'sha' => $matches['sha'],
        ];
    }
}
