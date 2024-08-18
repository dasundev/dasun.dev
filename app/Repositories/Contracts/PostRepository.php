<?php

declare(strict_types=1);

namespace App\Repositories\Contracts;

use Illuminate\Support\Collection;

interface PostRepository
{
    public function getPublishedPosts(): Collection;

    public function getLatestPost(): Collection;
}
