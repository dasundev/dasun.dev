<?php

declare(strict_types=1);

namespace App\Livewire;

use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;

final class OpenSource extends Component
{
    public function mount(): void
    {
        SEOMeta::setTitle('Open Source');
        SEOMeta::setDescription('Check out my open-source Laravel packages for your project.');
    }

    #[Title('Open Source')]
    public function render(): View
    {
        return view('livewire.open-source');
    }
}
