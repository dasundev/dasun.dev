<?php

namespace App\Nova\Dashboards;

use App\Nova\Metrics\NewsletterSubscribers;
use Laravel\Nova\Dashboards\Main as Dashboard;

class Main extends Dashboard
{
    /**
     * Get the cards for the dashboard.
     */
    public function cards(): array
    {
        return [
            new NewsletterSubscribers,
        ];
    }
}
