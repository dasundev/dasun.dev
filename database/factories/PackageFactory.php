<?php

namespace Database\Factories;

use App\Models\Package;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PackageFactory extends Factory
{
    protected $model = Package::class;

    public function definition(): array
    {
        $name = $this->faker->text();

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => $this->faker->text(),
            'repository' => Str::slug($name),
            'github_stars' => $this->faker->randomNumber(),
            'downloads_total' => $this->faker->randomNumber(),
        ];
    }

    public function draft(): static
    {
        return $this->state(fn (array $attributes) => [
            'description' => null,
            'repository' => null,
            'github_stars' => null,
            'downloads_total' => null,
        ]);
    }
}
