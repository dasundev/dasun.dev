<?php

namespace App\Models;

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

    public function scopeVisibility($query, $value)
    {
        return $query->whereVisibility($value);
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
            ->updated($this->updated_at)
            ->link(route('show-post', $this->slug))
            ->authorName($this->author)
            ->authorEmail($this->authorEmail);
    }

    public function getAllFeedItems(): Collection
    {
        return Post::visibility('public')->get();
    }
}
