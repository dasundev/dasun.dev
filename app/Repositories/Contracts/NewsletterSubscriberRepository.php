<?php

namespace App\Repositories\Contracts;

use Illuminate\Support\Collection;

interface NewsletterSubscriberRepository
{
    public function createSubscriber(array $attributes): Collection;
}
