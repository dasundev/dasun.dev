<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'downloads_total',
        'github_stars',
        'is_premium',
        'price',
        'anystack_product_id',
    ];

    public function isPremium(): bool
    {
        return $this->is_premium;
    }

    public function scopeOpenSource(Builder $query): void
    {
        $query->where('is_premium', false);
    }

    public function lines(): MorphMany
    {
        return $this->morphMany(OrderLine::class, 'purchasable');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
