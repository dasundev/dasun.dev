<?php

namespace App\Repositories;

use App\Models\NewsletterSubscriber;
use App\Repositories\Contracts\NewsletterSubscriberRepository;
use Illuminate\Support\Collection;

class EloquentNewsletterSubscriberRepository implements NewsletterSubscriberRepository
{
    public function createSubscriber(array $attributes): Collection
    {
        return NewsletterSubscriber::create($attributes);
    }
}
