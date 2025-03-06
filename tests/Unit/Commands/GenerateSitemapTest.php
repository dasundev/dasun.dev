<?php

declare(strict_types=1);

use App\Console\Commands\GenerateSitemap;

test('generate sitemap', function () {
    $this->artisan(GenerateSitemap::class)
        ->assertExitCode(0);

    $this->assertFileExists(public_path('sitemap.xml'));
});
