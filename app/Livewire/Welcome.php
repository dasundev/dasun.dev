<?php

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;

class Welcome extends Component
{
    #[Title('dasun.dev - Laravel Developer')]
    public function render(): View
    {
        return view('livewire.welcome');
    }
}
