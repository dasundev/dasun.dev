<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Repositories\Contracts\PackageRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

final class Packages extends Component
{
    public function render(): View
    {
        return view('livewire.packages', [
            'packages' => Cache::remember('open_source_packages', 60 * 60, function () {
                return app(PackageRepository::class)->getOpenSourcePackages();
            }),
        ]);
    }
}
