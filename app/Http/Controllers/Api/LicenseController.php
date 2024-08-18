<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

final class LicenseController
{
    /**
     * Store a new license.
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

        $user->licenses()->updateOrCreate([
            'name' => $request->license,
            'purchasable_type' => $request->purchasable_type,
            'purchasable_id' => $request->purchasable_id,
            'key' => Str::uuid(),
            'expires_at' => $request->expires_at,
        ]);

        // Once the license is created, the LicenseCreated event will fire.

        return response('License issued successfully.', 200);
    }
}
