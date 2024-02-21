<?php

namespace App\Repositories;

use App\Models\Post;
use App\Repositories\Contracts\PostRepository;
use Illuminate\Support\Collection;

class EloquentPostRepository extends BaseRepository implements PostRepository
{
    public function __construct(Post $model)
    {
        parent::__construct($model);
    }

    public function getPublishedPosts(): Collection
    {
        return $this
            ->model
            ->published()
            ->visibility('public')
            ->orderByDesc('published_at')
            ->get();
    }
}
