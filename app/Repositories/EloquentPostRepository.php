<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Post;
use App\Repositories\Contracts\PostRepository;
use Illuminate\Support\Collection;

final class EloquentPostRepository implements PostRepository
{
    public function getPublishedPosts(): Collection
    {
        return Post::published()
            ->orderByDesc('published_at')
            ->orderByDesc('updated_at')
            ->get();
    }

    public function getLatestPost(): Collection
    {
        return Post::published()
            ->orderByDesc('published_at')
            ->orderByDesc('updated_at')
            ->take(1)
            ->get();
    }
}
