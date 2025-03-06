<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;

final class Post extends Model implements Feedable
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'published_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Scope a query to only include published posts.
     */
    public function scopePublished(Builder $query): void
    {
        $query->whereNotNull('published_at');
    }

    /**
     * Determine if the post has been edited.
     */
    public function isEdited(): bool
    {
        return Carbon::parse($this->published_at)->isBefore($this->updated_at);
    }

    /**
     * Determine if the post has been published.
     */
    public function isPublished(): bool
    {
        return $this->published_at !== null;
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

    /**
     * Mark the post as draft.
     */
    public function markAsDraft(): void
    {
        $this->update([
            'published_at' => null,
        ]);
    }

    /**
     * Configure the feed item.
     */
    public function toFeedItem(): FeedItem
    {
        return FeedItem::create()
            ->id((string) $this->id)
            ->title($this->title)
            ->summary($this->excerpt)
            ->updated($this->published_at)
            ->link(route('blog-post', $this->slug))
            ->authorName('Dasun Tharanga')
            ->authorEmail('hello@dasun.dev');
    }
}
