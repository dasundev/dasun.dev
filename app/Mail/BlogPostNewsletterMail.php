<?php

namespace App\Mail;

use App\Models\NewsletterSubscriber;
use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BlogPostNewsletterMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public readonly Post $post,
        private readonly NewsletterSubscriber $newsletterSubscriber
    ) {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            to: $this->newsletterSubscriber->email,
            subject: $this->post->title
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'mails.newsletters.blog-post-newsletter',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
