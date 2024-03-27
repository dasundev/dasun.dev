<?php

namespace App\Repositories\Contracts;

use App\Models\NewsletterSubscriber;

interface NewsletterSubscriberRepository
{
    public function createSubscriber(array $attributes): NewsletterSubscriber;

    public function isSubscribed(string $email): bool;

    public function verify(string $email): bool;

    public function deleteSubscriber(string $email): bool;
}
