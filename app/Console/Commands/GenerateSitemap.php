<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Repositories\Contracts\PostRepository;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

final class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';

    protected $description = 'Generate the sitemap.';

    public function handle(): void
    {
        Log::alert('Generating sitemap...');

        $blogPostsSlugs = app(PostRepository::class)
            ->getPublishedPosts()
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
