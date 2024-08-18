<?php

declare(strict_types=1);

namespace App\Listeners;

use Dasundev\PayHere\Events\PaymentVerified;

final class OrderPaid
{
    public function handle(PaymentVerified $event): void
    {
        $event->payment->order->markAsPaid();
    }
}
