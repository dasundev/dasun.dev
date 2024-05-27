<?php

namespace App\Listeners;

use Dasundev\PayHere\Events\PaymentVerified;

class OrderPaid
{
    public function handle(PaymentVerified $event): void
    {
        $event->payment->order->markAsPaid();
    }
}
