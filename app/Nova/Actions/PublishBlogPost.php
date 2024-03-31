<?php

namespace App\Nova\Actions;

use App\Mail\BlogPostNewsletterMail;
use App\Models\NewsletterSubscriber;
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

class PublishBlogPost extends Action implements ShouldQueue
{
    use InteractsWithQueue, Queueable;

    public $name = 'Publish';

    /**
     * Perform the action on the given models.
     *
     * @param ActionFields $fields
     * @param Collection $models
     * @return void
     */
    public function handle(ActionFields $fields, Collection $models): void
    {
        foreach ($models as $post) {
            $this->sendBlogPostNewsletter($post);
        }
    }

    /**
     * Get the fields available on the action.
     *
     * @param NovaRequest $request
     * @return array
     */
    public function fields(NovaRequest $request): array
    {
        return [];
    }

    private function sendBlogPostNewsletter(Post $post): void
    {
        $subscribers = app(NewsletterSubscriberRepository::class)->getAllSubscribers();

        foreach ($subscribers as $subscriber) {
            Mail::send(new BlogPostNewsletterMail($post, $subscriber));
        }
    }
}
