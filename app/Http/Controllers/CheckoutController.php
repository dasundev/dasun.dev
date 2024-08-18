<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Package;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

final class CheckoutController
{
    public function checkout(Package $package, Request $request)
    {
        // If the package has a website URL, the user is not allowed to buy it.
        Gate::allowIf(! $package->hasWebsiteUrl());

        // Check if the package is premium
        if (! $package->isPremium()) {
            return back()->with('error', 'Open-source packages are not purchasable!');
        }

        // Create a new order for the current user
        $order = Order::create([
            'user_id' => $request->user()->id,
            'total' => $package->price,
        ]);

        // Add an order line for the package
        $order->lines()->create([
            'purchasable_id' => $package->id,
            'purchasable_type' => Package::class,
            'unit_price' => $package->price,
            'total' => $package->price,
        ]);

        try {
            return $request
                ->user()
                ->newOrder($order)
                ->item($package->name)
                ->checkout();
        } catch (Exception $e) {
            Log::error($e->getMessage());

            return back()->with('error', 'Checkout process failed!');
        }
    }
}
