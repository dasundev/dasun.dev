<?php

namespace App\Providers;

use App\Repositories\Contracts\PackageRepository;
use App\Repositories\Contracts\PostRepository;
use App\Repositories\EloquentPackageRepository;
use App\Repositories\EloquentPostRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(PostRepository::class, EloquentPostRepository::class);
        $this->app->bind(PackageRepository::class, EloquentPackageRepository::class);
    }

    public function boot(): void
    {
        //
    }
}
