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

    public function isSubscribed(string $email): bool
    {
        return NewsletterSubscriber::whereEmail($email)->exists();
    }

    public function verify(string $email): bool
    {
        return NewsletterSubscriber::whereEmail($email)->update([
            'email_verified_at' => now(),
        ]);
    }
}
