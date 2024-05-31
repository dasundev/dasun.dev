<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Package;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller
{
    public function checkout(Package $package, Request $request)
    {
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
