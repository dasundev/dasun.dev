<?php

namespace App\Models;

use App\Repositories\Contracts\PostRepository;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;

class Post extends Model implements Feedable
{
    use HasFactory;

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function scopePublished($query)
    {
        return $query->whereNotNull('published_at');
    }

    public function scopePublic($query)
    {
        return $query->whereVisibility('public');
    }

    public function isPublic(): bool
    {
        return $this->visibility === 'public';
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
            ->id($this->id)
            ->title($this->title)
            ->summary($this->excerpt)
            ->updated($this->published_at)
            ->link(route('show-post', $this->slug))
            ->authorName($this->author)
            ->authorEmail($this->authorEmail);
    }

    public function getAllFeedItems(): Collection
    {
        return app(PostRepository::class)->getPublicPosts();
    }

    /**
     * Determine if the post has been edited.
     *
     * @return bool
     */
    public function isEdited(): bool
    {
        return $this->published_at->isBefore($this->updated_at);
    }
}
