<?php

namespace App\Repositories\Contracts;

use App\Models\NewsletterSubscriber;

interface NewsletterSubscriberRepository
{
    public function createSubscriber(array $attributes): NewsletterSubscriber;

    public function isEmailVerified(string $email): bool;

    public function verifyEmail(string $email): bool;

    public function deleteSubscriber(string $email): bool;

    public function isSubscriberExists(string $email): bool;
}
