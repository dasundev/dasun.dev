<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\License;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;

class SatisAuthenticationController extends Controller
{
    public function __invoke(Authenticatable $license, Request $request)
    {
        /** @var $license License */
        if (! $license instanceof License) {
            abort(401);
        }

        $package = $this->getRequestedPackage($request);

        $hasAccess = License::query()
            ->with(['purchasable'])
            ->whereNotExpired()
            ->where('user_id', $license->user_id)
            ->get()
            ->contains(
                fn (License $license) => $license->purchasable->includesPackageAccess($package)
            );

        abort_unless($hasAccess, 401);

        return response('valid');
    }

    protected function getRequestedPackage(Request $request): string
    {
        $originalUrl = $request->header('X-Original-URI', '');

        preg_match('#^/dist/(?<package>dasundev/[^/]*)/#', $originalUrl, $matches);

        if (! array_key_exists('package', $matches)) {
            abort(401, 'Missing X-Original-URI header');
        }

        return $matches['package'];
    }
}
