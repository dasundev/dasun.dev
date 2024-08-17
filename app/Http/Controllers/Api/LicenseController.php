<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LicenseController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'license' => ['required', 'string', 'max:255'],
            'purchasable_type' => ['required', 'string', 'max:255'],
            'purchasable_id' => ['required', 'string', 'max:255'],
            'expires_at' => ['required', 'date'],
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

        // Instantiate a new purchasable instance.
        $purchasable = new $request->purchasable_type;

        // Check if the purchasable item exists in the database.
        $isPurchasableExists = $purchasable::find($request->purchasable_id)->exists();

        if (! $isPurchasableExists) {
            return response('The purchasable item could not be found.', 404);
        }

        $user->licenses()->create([
            'name' => $request->license,
            'purchasable_type' => $request->purchasable_type,
            'purchasable_id' => $request->purchasable_id,
            'key' => Str::uuid(),
            'expires_at' => $request->expires_at,
        ]);

        return response('License issued successfully.', 200);
    }
}
