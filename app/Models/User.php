<?php

declare(strict_types=1);

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Dasundev\PayHere\Billable;
use Dasundev\PayHere\Filament\Contracts\PayHerePanelUser;
use Dasundev\PayHere\Models\Contracts\PayHereCustomer;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

final class User extends Authenticatable implements MustVerifyEmail, PayHereCustomer, PayHerePanelUser
{
    use Billable, HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'city',
        'country',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function isAdmin(): bool
    {
        return $this->email === 'hello@dasun.dev';
    }

    public function payHereFirstName(): ?string
    {
        return explode(' ', trim($this->name))[0];
    }

    public function payHereLastName(): ?string
    {
        return explode(' ', trim($this->name))[1];
    }

    public function payHereEmail(): ?string
    {
        return $this->email;
    }

    public function payHerePhone(): ?string
    {
        return null;
    }

    public function payHereAddress(): ?string
    {
        return null;
    }

    public function payHereCity(): ?string
    {
        return null;
    }

    public function payHereCountry(): ?string
    {
        return null;
    }

    public function licenses(): HasMany
    {
        return $this->hasMany(License::class);
    }

    public function canAccessPayHerePanel(): bool
    {
        return $this->email === 'hello@dasun.dev';
    }
}
