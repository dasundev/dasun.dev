<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Post;
use Illuminate\Support\Collection;

final class Feed
{
    /**
     * Get all feed items.
     */
    public static function getAllFeedItems(): Collection
    {
        return Post::query()
            ->published()
            ->orderByDesc('published_at')
            ->get();
    }
}
