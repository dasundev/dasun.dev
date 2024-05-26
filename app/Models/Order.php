<?php

namespace App\Models;

use Dasundev\PayHere\Models\Contracts\PayHereOrder;
use Dasundev\PayHere\Models\Payment;
use Dasundev\PayHere\Models\Subscription;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model implements PayHereOrder
{
    use HasFactory;

    protected $guarded = [];

    public function payherePayment(): HasOne
    {
        return $this->hasOne(Payment::class);
    }

    public function payhereSubscription(): HasOne
    {
        return $this->hasOne(Subscription::class);
    }
}
