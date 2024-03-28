<?php

namespace App\Repositories\Contracts;

use Illuminate\Support\Collection;

interface PostRepository
{
    public function getPublicPosts(): Collection;

    public function getLatestPost(): Collection;
}
