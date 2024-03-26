<?php

namespace App\Mail;

use App\Models\NewsletterSubscriber;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewsletterSubscriberVerifyEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public function __construct(
        private readonly NewsletterSubscriber $subscriber
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            to: $this->subscriber->email,
            subject: "Confirm Your Subscription to Dasun's Blog Newsletter",
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'mails.newsletters.newsletter-subscriber-verify-email',
        );
    }
}
