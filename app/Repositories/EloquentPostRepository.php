<?php

namespace App\Repositories;

use App\Models\Post;
use App\Repositories\Contracts\PostRepository;
use Illuminate\Support\Collection;

class EloquentPostRepository implements PostRepository
{
    public function getPublicPosts(): Collection
    {
        return Post::public()
            ->published()
            ->orderByDesc('published_at')
            ->get();
    }
}
