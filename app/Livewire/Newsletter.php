<?php

namespace App\Livewire;

use Exception;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Newsletter extends Component
{
    public $email;

    public function subscribe(): void
    {
        try {
            $this->dispatch('subscribed', message: "Success! I've just sent you an email. Simply click the link inside to confirm your subscription.");
        } catch (Exception $e) {
            $this->dispatch('subscribed', message: "Apologies, but it seems we're experiencing a server error.");
        }
    }

    public function render(): View
    {
        return view('livewire.newsletter');
    }
}
