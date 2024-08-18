<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Repositories\Contracts\PackageRepository;
use App\Repositories\Contracts\PostRepository;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\Title;
use Livewire\Component;

final class Welcome extends Component
{
    public function mount(): void
    {
        SEOMeta::setTitle('dasun.dev - Laravel Developer');
        SEOMeta::setDescription('I craft web applications, courses & open source packages with Laravel ecosystem — Let’s create something awesome!');
    }

    #[Title('dasun.dev - Laravel Developer')]
    public function render(): View
    {
        return view('livewire.welcome', [
            'posts' => app(PostRepository::class)->getLatestPost(),
            'premiumPackages' => Cache::remember('premium_packages', 60 * 60, function () {
                return app(PackageRepository::class)->getPremiumPackages();
            }),
        ]);
    }
}
