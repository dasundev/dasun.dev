<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Events\NewsletterSubscribed;
use App\Repositories\Contracts\NewsletterSubscriberRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\RateLimiter;
use Livewire\Attributes\Validate;
use Livewire\Component;

final class Newsletter extends Component
{
    #[Validate('required|email')]
    public $email = '';

    public function subscribe(): void
    {
        $this->validate();

        $newsletterSubscriberRepository = app(NewsletterSubscriberRepository::class);

        // Verify that the subscriber does not already exist in the database.
        if (! $newsletterSubscriberRepository->isSubscriberExists($this->email)) {
            $newsletterSubscriberRepository->createSubscriber(['email' => $this->email]);
        }

        $executed = RateLimiter::attempt(
            key: 'newsletter-subscription:'.$this->email,
            maxAttempts: 3,
            callback: function () use ($newsletterSubscriberRepository) {
                // Send the confirmation email to subscribers if their email addresses have not been verified yet.
                if (! $newsletterSubscriberRepository->isEmailVerified($this->email)) {
                    NewsletterSubscribed::dispatch($this->email);
                }
            },
            decaySeconds: 60 * 5
        );

        if (! $executed) {
            $this->dispatch('subscribed', message: 'You may try again in 5 minutes.');
        } else {
            $this->dispatch('subscribed', message: "Success! I've just sent you an email. Simply click the link inside to confirm your subscription.");
        }
    }

    public function render(): View
    {
        return view('livewire.newsletter');
    }
}
