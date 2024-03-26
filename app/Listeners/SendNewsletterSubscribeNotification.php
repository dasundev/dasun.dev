<?php

namespace App\Listeners;

use App\Events\NewsletterSubscribed;
use App\Mail\NewsletterSubscriberVerifyEmail;
use Illuminate\Contracts\Events\ShouldHandleEventsAfterCommit;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendNewsletterSubscribeNotification implements ShouldHandleEventsAfterCommit, ShouldQueue
{
    public string $queue = 'listeners';

    public function handle(NewsletterSubscribed $event): void
    {
        Mail::send((new NewsletterSubscriberVerifyEmail($event->subscriber)));
    }
}
