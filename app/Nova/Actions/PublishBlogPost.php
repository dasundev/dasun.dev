<?php

declare(strict_types=1);

namespace App\Nova\Actions;

use App\Mail\BlogPostNewsletterMail;
use App\Models\Post;
use App\Repositories\Contracts\NewsletterSubscriberRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Mail;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Http\Requests\NovaRequest;

final class PublishBlogPost extends Action implements ShouldQueue
{
    use InteractsWithQueue, Queueable;

    public $name = 'Publish';

    /**
     * Perform the action on the given models.
     */
    public function handle(ActionFields $fields, Collection $models): void
    {
        foreach ($models as $post) {
            $this->sendBlogPostNewsletter($post);
            $this->publishBlogPost($post);
        }
    }

    /**
     * Get the fields available on the action.
     */
    public function fields(NovaRequest $request): array
    {
        return [];
    }

    /**
     * Publish the blog post if it hasn't been published before.
     */
    private function publishBlogPost(Post $post): void
    {
        if (! $post->isPublished()) {
            $post->markAsPublished();
        }
    }

    /**
     * Send the blog post newsletter.
     */
    private function sendBlogPostNewsletter(Post $post): void
    {
        $subscribers = app(NewsletterSubscriberRepository::class)->getAllSubscribers();

        foreach ($subscribers as $subscriber) {
            // Send the newsletter if it hasn't been sent before.
            if (! $post->hasSentNewsletter()) {
                Mail::send(new BlogPostNewsletterMail($post, $subscriber));
            }
        }

        $post->markNewsletterAsSent();
    }
}
