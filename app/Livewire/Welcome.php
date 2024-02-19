<?php

namespace App\Livewire;

use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;

class Welcome extends Component
{
    public function mount(): void
    {
        SEOMeta::setTitle('dasun.dev - Laravel Developer');
        SEOMeta::setDescription('I craft web applications, courses & open source packages with Laravel ecosystem — Lets’ create something awesome!');
    }

    #[Title('dasun.dev - Laravel Developer')]
    public function render(): View
    {
        return view('livewire.welcome');
    }
}
