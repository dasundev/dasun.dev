<?php

namespace App\Mail;

use App\Models\NewsletterSubscriber;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\URL;

class NewsletterSubscriberVerifyEmail extends Mailable
{
    use Queueable, SerializesModels;

    public string $confirmationUrl;

    public function __construct(
        private readonly string $subscriber
    ) {
        $this->confirmationUrl = URL::temporarySignedRoute(
            'newsletter.confirm-subscription', now()->addMinutes(30), ['email' => $this->subscriber]
        );
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            to: $this->subscriber,
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
