<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Schedule;

Schedule::everyTenMinutes()
    ->group(function () {
        Schedule::command('sync:packagist');
        Schedule::command('generate:sitemap');
    });

Schedule::command('import:docs')->everyTwoHours();
