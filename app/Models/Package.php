<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Builder;

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
