<?php

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;

uses(DatabaseMigrations::class);

test('guest users should be forbidden from accessing the pulse dashboard', function () {
    $response = $this->get('/pulse');

    $response->assertStatus(403);
});

test('actual users should be forbidden from accessing the pulse dashboard', function () {
    $user = User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->get('/pulse');

    $response->assertStatus(403);
});

test('admin should be can accessing the pulse dashboard', function () {
    $user = User::factory()
        ->state(['email' => 'hello@dasun.dev'])
        ->create();

    $response = $this
        ->actingAs($user)
        ->get('/pulse');

    $response->assertStatus(200);
});