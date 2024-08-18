<?php

declare(strict_types=1);

namespace App\Livewire;

use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;

final class Terms extends Component
{
    public function mount(): void
    {
        SEOMeta::setTitle('Terms and Conditions');
        SEOMeta::setDescription('Learn about terms of condition.');
    }

    #[Title('Terms and Conditions')]
    public function render(): View
    {
        return view('livewire.terms-of-conditions');
    }
}
