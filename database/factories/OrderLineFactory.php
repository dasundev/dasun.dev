<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Order;
use App\Models\OrderLine;
use App\Models\Package;
use Illuminate\Database\Eloquent\Factories\Factory;

final class OrderLineFactory extends Factory
{
    protected $model = OrderLine::class;

    public function definition(): array
    {
        $unitPrice = fake()->numberBetween(100, 1000);
        $unitQty = fake()->numberBetween(1, 10);
        $total = $unitPrice * $unitQty;

        return [
            'order_id' => Order::factory(),
            'purchasable_type' => Package::class,
            'purchasable_id' => Package::factory(),
            'unit_price' => $unitPrice,
            'unit_quantity' => $unitQty,
            'total' => $total,
        ];
    }
}
