<?php

namespace App\Livewire;

use App\Repositories\Contracts\NewsletterSubscriberRepository;
use Exception;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Newsletter extends Component
{
    #[Validate('required|email')]
    public $email = '';

    public function subscribe(): void
    {
        $this->validate();

        $repository = app(NewsletterSubscriberRepository::class);

        if (! $repository->isSubscribed($this->email)) {
            $repository->createSubscriber(['email' => $this->email]);
        }

        $this->dispatch('subscribed', message: "Success! I've just sent you an email. Simply click the link inside to confirm your subscription.");
    }

    public function render(): View
    {
        return view('livewire.newsletter');
    }
}
