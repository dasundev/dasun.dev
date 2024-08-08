<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'composer_package',
        'slug',
        'description',
        'downloads_total',
        'github_stars',
        'is_premium',
        'price',
        'anystack_product_id',
        'thumbnail',
        'documentation_url',
    ];

    public function isPremium(): bool
    {
        return $this->is_premium;
    }

    public function scopeOpenSource(Builder $query): void
    {
        $query->where('is_premium', false);
    }

    public function scopePremium(Builder $query): void
    {
        $query->where('is_premium', true);
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
