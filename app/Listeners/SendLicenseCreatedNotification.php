<?php

declare(strict_types=1);

namespace App\Listeners;

use App\Mail\NewLicenseEmail;
use Illuminate\Support\Facades\Mail;

final class SendLicenseCreatedNotification
{
    public function handle($event): void
    {
        Mail::send((new NewLicenseEmail($event->license)));
    }
}
