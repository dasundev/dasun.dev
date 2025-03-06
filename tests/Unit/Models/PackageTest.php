<?php

declare(strict_types=1);

use App\Models\Package;

test('to array', function () {
    $package = Package::factory()->create()->fresh();

    expect(array_keys($package->toArray()))->toBe([
        'id',
        'name',
        'description',
        'downloads',
        'github_stars',
        'repository',
        'created_at',
        'updated_at',
    ]);
});
