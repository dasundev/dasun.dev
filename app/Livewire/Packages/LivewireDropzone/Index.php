<?php

declare(strict_types=1);

namespace App\Livewire\Packages\LivewireDropzone;

use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;

final class Index extends Component
{
    public function mount(): void
    {
        SEOMeta::setTitle('Livewire Dropzone Themes');
        SEOMeta::setDescription('The default theme works well, but you can enhance the Livewire Dropzone further with our premium themes.');
    }

    #[Title('Livewire Dropzone Themes')]
    public function render(): View
    {
        return view('livewire.products.livewire-dropzone.index');
    }
}
