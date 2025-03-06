<?php

declare(strict_types=1);

use App\Models\Post;
use App\Services\Feed;

it('can feed published posts', function () {
    Post::factory()->count(3)->create();

    expect(Feed::getAllFeedItems())
        ->toBeObject(Illuminate\Database\Eloquent\Collection::class)
        ->toHaveCount(3);
});

it('can not feed unpublished posts', function () {
    Post::factory()->count(3)->unpublished()->create();

    expect(Feed::getAllFeedItems())
        ->toBeObject(Illuminate\Database\Eloquent\Collection::class)
        ->toHaveCount(0);
});
