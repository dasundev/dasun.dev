<?php

namespace App\Livewire;

use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;

class About extends Component
{
    public function mount(): void
    {
        SEOMeta::setTitle('About');
        SEOMeta::setDescription('Brief information about me.');
    }

    #[Title('About')]
    public function render(): View
    {
        return view('livewire.about');
    }
}
