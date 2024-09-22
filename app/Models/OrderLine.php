<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

final class OrderLine extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function purchasable(): MorphTo
    {
        return $this->morphTo();
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function payHereOrderLineId(): string
    {
        return $this->id;
    }

    public function payHereOrderLineTitle(): string
    {
        return $this->purchasable->name;
    }

    public function payHereOrderLineQty(): int
    {
        return $this->unit_quantity;
    }

    public function payHereOrderLineTotal(): float
    {
        return $this->total;
    }

    public function payHereOrderLineUnitPrice(): float
    {
        return $this->unit_price;
    }
}
