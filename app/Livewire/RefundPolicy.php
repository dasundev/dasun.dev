<?php

namespace App\Livewire;

use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;

class RefundPolicy extends Component
{
    public function mount(): void
    {
        SEOMeta::setTitle('Refund Policy');
        SEOMeta::setDescription('Learn about our refund policy.');
    }

    #[Title('Refund Policy')]
    public function render(): View
    {
        return view('livewire.refund-policy');
    }
}
