<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Package;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

final class PackageFactory extends Factory
{
    protected $model = Package::class;

    public function definition(): array
    {
        return [
            'identifier' => 'dasundev/'.fake()->name(),
            'description' => fake()->text(),
            'downloads' => fake()->randomNumber(),
            'github_stars' => fake()->randomNumber(),
            'repository' => fake()->name(),
            'documentation' => fake()->boolean(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
