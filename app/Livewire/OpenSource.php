<?php

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;

class OpenSource extends Component
{
    #[Title('Open Source')]
    public function render(): View
    {
        return view('livewire.open-source');
    }
}
