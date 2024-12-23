<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

final class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->registerGates();
        $this->registerStringMacros();
        $this->registerViteAliases();
    }

    private function registerGates(): void
    {
        Gate::define('viewPulse', function (User $user) {
            return $user->isAdmin();
        });

        Gate::define('showBlogPost', function (?User $user, Post $post) {
            if ($post->isPublished()) {
                return true;
            }

            if (Auth::check()) {
                return $user->isAdmin();
            }

            return false;
        });
    }

    private function registerStringMacros(): void
    {
        Str::macro('readTime', function (...$text) {
            $totalWords = Str::wordCount(implode(' ', $text));
            $minutesToRead = round($totalWords / 200);

            return (int) max(1, $minutesToRead);
        });
    }

    private function registerViteAliases(): void
    {
        Vite::macro('image', fn (string $asset) => $this->asset("resources/images/{$asset}"));
    }
}
