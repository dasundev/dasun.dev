<?php

namespace App\Livewire;

use App\Repositories\Contracts\PackageRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class Packages extends Component
{
    public function render(): View
    {
        return view('livewire.packages', [
            'packages' => Cache::remember('packages', 60 * 60, function () {
                return app(PackageRepository::class)->getAllPackages();
            }),
        ]);
    }
}
