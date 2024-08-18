<?php

namespace App\Nova\Metrics;

use App\Models\NewsletterSubscriber;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Metrics\Value;

class NewsletterSubscribers extends Value
{
    /**
     * Calculate the value of the metric.
     */
    public function calculate(NovaRequest $request): mixed
    {
        return $this->count($request, NewsletterSubscriber::class);
    }

    /**
     * Get the ranges available for the metric.
     */
    public function ranges(): array
    {
        return [
            'ALL' => 'All Time',
        ];
    }
}
