<?php

namespace App\Providers;

use App\Repositories\Contracts\PostRepository;
use App\Repositories\EloquentPostRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(PostRepository::class, EloquentPostRepository::class);
    }

    public function boot(): void
    {
        //
    }
}
