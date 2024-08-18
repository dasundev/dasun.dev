<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\NewsletterSubscriber;
use App\Repositories\Contracts\NewsletterSubscriberRepository;
use Illuminate\Support\Collection;

final class EloquentNewsletterSubscriberRepository implements NewsletterSubscriberRepository
{
    public function createSubscriber(array $attributes): NewsletterSubscriber
    {
        return NewsletterSubscriber::create($attributes);
    }

    public function isEmailVerified(string $email): bool
    {
        return NewsletterSubscriber::whereEmail($email)
            ->whereNotNull('email_verified_at')
            ->exists();
    }

    public function verifyEmail(string $email): bool
    {
        return NewsletterSubscriber::whereEmail($email)->update([
            'email_verified_at' => now(),
        ]);
    }

    public function deleteSubscriber(string $email): bool
    {
        return NewsletterSubscriber::whereEmail($email)->delete();
    }

    public function isSubscriberExists(string $email): bool
    {
        return NewsletterSubscriber::whereEmail($email)->exists();
    }

    public function getAllSubscribers(): Collection
    {
        return NewsletterSubscriber::all();
    }
}
