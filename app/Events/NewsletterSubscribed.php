<?php

declare(strict_types=1);

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

final class NewsletterSubscribed
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(
        public string $subscriber
    ) {}
}
