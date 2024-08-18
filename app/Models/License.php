<?php

declare(strict_types=1);

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

final class License extends Model implements AuthenticatableContract
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

    public function isPerpetualLicense(): bool
    {
        return ! is_null($this->fallback_version);
    }

    public function getRouteKeyName(): string
    {
        return 'key';
    }

    /**
     * Check if the requested version can be accessed based on the license's fallback version.
     */
    public function hasLicenseAccess(array $package): bool
    {
        if (! $this->isExpired()) {
            return true;
        }

        if ($this->isPerpetualLicense()) {
            if ($this->purchasable->composer_package !== $package['name']) {
                return false;
            }

            $fallbackVersion = $this->fallback_version ?? null;

            if ($fallbackVersion === null) {
                return false;
            }

            $requestedVersion = collect($this->purchasable->tags)
                ->first(fn ($tag) => $tag['sha'] === $package['sha']);

            if ($requestedVersion === null) {
                return false;
            }

            return version_compare($fallbackVersion['name'], $requestedVersion['name'], '>=');
        }

        return false;
    }
}
