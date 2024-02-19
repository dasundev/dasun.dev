<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';

    protected $description = 'Generate the sitemap.';

    public function handle(): void
    {
        Log::alert('Generating sitemap...');

        $blogPostsSlugs = Post::all()
            ->whereNotNull('published_at')
            ->sortByDesc('created_at')
            ->pluck('slug')
            ->map(fn ($slug) => Url::create("/blog/$slug"));

        Sitemap::create()
            ->add(Url::create('/'))
            ->add(Url::create('/blog'))
            ->add(Url::create('/about'))
            ->add(Url::create('/open-source'))
            ->add($blogPostsSlugs)
            ->writeToFile(public_path('sitemap.xml'));

        Log::alert('Sitemap generated successfully.');
    }
}
