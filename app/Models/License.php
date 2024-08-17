<?php

namespace App\Models;

use App\Events\LicenseCreated;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class License extends Model implements AuthenticatableContract
{
    use Authenticatable;
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    protected $casts = [
        'expires_at' => 'datetime',
        'fallback_version' => 'array',
    ];

    protected $dispatchesEvents = [
        'created' => LicenseCreated::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function purchasable(): MorphTo
    {
        return $this->morphTo();
    }

    public function scopeWhereNotExpired(Builder $query): void
    {
        $query->where('expires_at', '>=', now());
    }

    public function isExpired(): bool
    {
        if (is_null($this->expires_at)) {
            return false;
        }

        return $this->expires_at->isPast();
    }

    public function getRouteKeyName(): string
    {
        return 'key';
    }

    public function hasVersionAccess(string $sha): bool
    {
        if (! $this->isExpired()) {
            return true;
        }

        if (! $fallbackVersion = $this->fallback_version ?? null) {
            return false;
        }

        if (! $requestedVersion = collect($this->purchasable->tags)->first(fn ($tag) => $tag['sha'] === $sha)) {
            return false;
        }

        return version_compare($fallbackVersion['name'], $requestedVersion['name'], '>=');
    }
}
