<?php

namespace App\Repositories;

use App\Models\Post;
use App\Repositories\Contracts\PostRepository;
use Illuminate\Support\Collection;

class EloquentPostRepository implements PostRepository
{
    public function getPublicPosts(): Collection
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
