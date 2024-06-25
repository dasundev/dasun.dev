<?php

namespace App\Models;

use App\Enums\OrderStatus;
use Dasundev\PayHere\Models\Payment;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use HasUuids;
    use SoftDeletes;

    protected $guarded = [];

    protected $casts = [
        'status' => OrderStatus::class,
    ];

    public function payment(): HasOne
    {
        return $this->hasOne(Payment::class);
    }

    public function lines(): HasMany
    {
        return $this->hasMany(OrderLine::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function markAsPaid(): void
    {
        $this->update(['status' => OrderStatus::PAID]);
    }
}
