<?php

namespace App\Listeners;

use App\Mail\NewLicenseEmail;
use Illuminate\Support\Facades\Mail;

class SendLicenseCreatedNotification
{
    public function handle($event): void
    {
        Mail::send((new NewLicenseEmail($event->license)));
    }
}
