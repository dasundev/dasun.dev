<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class NovaUserSeeder extends Seeder
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
