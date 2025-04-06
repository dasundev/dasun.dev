<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Url;

final class GenerateSitemap extends Command
{
    protected $signature = 'generate:sitemap';

    protected $description = 'Generate the sitemap';

    public function handle(): void
    {
        SitemapGenerator::create(config('app.url'))
            ->getSitemap()
            ->add(Url::create('/docs'))
            ->writeToFile(public_path('sitemap.xml'));
    }
}
