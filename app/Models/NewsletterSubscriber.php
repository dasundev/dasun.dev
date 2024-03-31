<?php

namespace App\Models;

use App\Models\Scopes\EmailVerified;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsletterSubscriber extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'email_verified_at' => 'date',
    ];

    protected static function booted(): void
    {
        static::addGlobalScope(new EmailVerified);
    }
}
