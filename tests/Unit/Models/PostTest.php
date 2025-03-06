<?php

declare(strict_types=1);

use App\Models\Post;

test('to array', function () {
    $package = Post::factory()->create()->fresh();

    expect(array_keys($package->toArray()))->toBe([
        'id',
        'title',
        'slug',
        'excerpt',
        'content',
        'published_at',
        'created_at',
        'updated_at',
    ]);
});
