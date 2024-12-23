<?php

declare(strict_types=1);

namespace App\Models;

use App\Repositories\Contracts\PostRepository;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;

final class Post extends Model implements Feedable
{
    use HasFactory;
    use SoftDeletes;

    protected $casts = [
        'published_at' => 'datetime',
    ];

    protected $guarded = [];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function scopePublished($query)
    {
        return $query->whereNotNull('published_at');
    }

    public function link(): Attribute
    {
        return Attribute::get(fn ($value) => url($this->slug));
    }

    public function author(): Attribute
    {
        return Attribute::get(fn ($value) => 'Dasun Tharanga');
    }

    public function authorEmail(): Attribute
    {
        return Attribute::get(fn ($value) => 'hello@dasun.dev');
    }

    public function toFeedItem(): FeedItem
    {
        return FeedItem::create()
            ->id((string) $this->id)
            ->title($this->title)
            ->summary($this->excerpt)
            ->updated($this->published_at)
            ->link(route('show-post', $this->slug))
            ->authorName($this->author)
            ->authorEmail($this->authorEmail);
    }

    public function getAllFeedItems(): Collection
    {
        return app(PostRepository::class)->getPublishedPosts();
    }

    /**
     * Determine if the post has been edited.
     */
    public function isEdited(): bool
    {
        return $this->published_at->isBefore($this->updated_at);
    }

    /**
     * Determine if the post has been published.
     */
    public function isPublished(): bool
    {
        return $this->published_at !== null;
    }

    /**
     * Mark the newsletter as sent for the post.
     */
    public function markNewsletterAsSent(): void
    {
        $this->update([
            'newsletter_sent' => true,
        ]);
    }

    /**
     * Mark the post as published.
     */
    public function markAsPublished(): void
    {
        $this->update([
            'published_at' => now(),
        ]);
    }

    public function hasSentNewsletter(): bool
    {
        return $this->newsletter_sent === true;
    }
}
