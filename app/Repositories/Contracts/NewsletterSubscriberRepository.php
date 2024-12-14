<?php

declare(strict_types=1);

namespace App\Repositories\Contracts;

use App\Models\NewsletterSubscriber;
use Illuminate\Support\Collection;

interface NewsletterSubscriberRepository
{
    public function createSubscriber(array $attributes): NewsletterSubscriber;

    public function isEmailVerified(string $email): bool;

    public function verifyEmail(string $email): void;

    public function deleteSubscriber(string $email): bool;

    public function isSubscriberExists(string $email): bool;

    public function getAllSubscribers(): Collection;
}
