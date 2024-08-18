<?php

declare(strict_types=1);

namespace App\Events;

use App\Models\Post;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

final class BlogPostPublished
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(
        public readonly Post $post
    ) {}
}
