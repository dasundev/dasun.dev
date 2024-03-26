<?php

namespace App\Providers;

use App\Repositories\Contracts\NewsletterSubscriberRepository;
use App\Repositories\Contracts\PackageRepository;
use App\Repositories\Contracts\PostRepository;
use App\Repositories\EloquentNewsletterSubscriberRepository;
use App\Repositories\EloquentPackageRepository;
use App\Repositories\EloquentPostRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(PostRepository::class, EloquentPostRepository::class);
        $this->app->bind(PackageRepository::class, EloquentPackageRepository::class);
        $this->app->bind(NewsletterSubscriberRepository::class, EloquentNewsletterSubscriberRepository::class);
    }

    public function boot(): void
    {
        //
    }
}
