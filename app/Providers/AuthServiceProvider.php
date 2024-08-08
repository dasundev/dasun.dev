<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\License;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Auth::viaRequest('license-key', function (Request $request) {
            $license = License::query()
                ->where('key', $request->getPassword())
                ->first();

            if (! $license) {
                abort(401, 'License key invalid');
            }

            if ($license->isExpired()) {
                abort(401, 'This license is expired');
            }

            $license->increment('satis_authentication_count');

            return $license;
        });
    }
}
