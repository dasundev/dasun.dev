<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Dasundev\PayHere\Billable;
use Dasundev\PayHere\Models\Contracts\PayHereCustomer;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail, PayHereCustomer
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

    public function payHereFirstName(): string
    {
        return explode(' ', trim($this->name))[0];
    }

    public function payHereLastName(): string
    {
        return explode(' ', trim($this->name))[1];
    }

    public function payHereEmail(): string
    {
        return $this->email;
    }

    public function payHerePhone(): string
    {
        return $this->phone;
    }

    public function payHereAddress(): string
    {
        return $this->address;
    }

    public function payHereCity(): string
    {
        return $this->city;
    }

    public function payHereCountry(): string
    {
        return $this->country;
    }

    public function licenses(): HasMany
    {
        return $this->hasMany(License::class);
    }
}
