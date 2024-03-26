<?php

namespace App\Repositories;

use App\Models\NewsletterSubscriber;
use App\Repositories\Contracts\NewsletterSubscriberRepository;

class EloquentNewsletterSubscriberRepository implements NewsletterSubscriberRepository
{
    public function createSubscriber(array $attributes): NewsletterSubscriber
    {
        return NewsletterSubscriber::create($attributes);
    }
}
