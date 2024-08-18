<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Scopes\EmailVerified;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

final class NewsletterSubscriber extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'email_verified_at' => 'date',
    ];

    protected static function booted(): void
    {
        self::addGlobalScope(new EmailVerified);
    }
}
