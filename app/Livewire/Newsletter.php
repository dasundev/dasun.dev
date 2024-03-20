<?php

namespace App\Livewire;

use Livewire\Component;
use Exception;

class Newsletter extends Component
{
    public $isSubscribed = false;

    public function subscribe()
    {
        try {
            // TODO

            $this->isSubscribed = true;

            return back()->with('success', "Success! I've just sent you an email. Simply click the link inside to confirm your subscription.");
        } catch (Exception $e) {
            return back()->with('error', "Apologies, but it seems we're experiencing a server error.");
        }
    }

    public function render()
    {
        return view('livewire.newsletter');
    }
}
