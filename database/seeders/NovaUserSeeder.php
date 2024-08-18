<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

final class NovaUserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()
            ->state([
                'name' => 'Dasun Tharanga',
                'email' => 'hello@dasun.dev',
                'password' => 'password',
            ])
            ->create();
    }
}
