<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\License;
use Illuminate\Database\Eloquent\Factories\Factory;

final class LicenseFactory extends Factory
{
    protected $model = License::class;

    public function definition(): array
    {
        return [
            'name' => fake()->word,
            'key' => fake()->uuid,
            'expires_at' => now()->addYear(),
        ];
    }
}
