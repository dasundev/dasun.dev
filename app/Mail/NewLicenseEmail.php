<?php

namespace App\Mail;

use App\Models\License;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewLicenseEmail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public readonly License $license
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            to: $this->license->user->email,
            subject: 'New License Issued: '.$this->license->name
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.new-license-email',
        );
    }
}
