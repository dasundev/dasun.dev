<?php

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;

class About extends Component
{
    #[Title('About')]
    public function render(): View
    {
        return view('livewire.about');
    }
}
