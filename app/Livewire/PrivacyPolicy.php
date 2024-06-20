<?php

namespace App\Livewire;

use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;

class PrivacyPolicy extends Component
{
    public function mount(): void
    {
        SEOMeta::setTitle('Privacy Policy');
        SEOMeta::setDescription('Learn about our privacy policy.');
    }

    #[Title('Privacy Policy')]
    public function render(): View
    {
        return view('livewire.privacy-policy');
    }
}
