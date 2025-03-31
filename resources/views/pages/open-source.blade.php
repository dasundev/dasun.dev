<?php

use Livewire\Attributes\Computed;
use Livewire\Volt\Component;
use function Livewire\Volt\{computed, title, with, layout};
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use App\Services\Packagist;
use App\Models\Package;

new class extends Component {
    #[Computed]
    public function packages()
    {
        return Cache::remember('packages', 120, fn() => Package::query()->orderByDesc('downloads')->get());
    }

    public function render(): mixed
    {
        return view('pages.open-source')
            ->title('Open Source')
            ->layoutData(['description' => 'Things I built for the community.']);
    }
}

?>

<div>
    <h1 class="text-zinc-100 text-4xl md:text-5xl font-bold tracking-tight leading-normal">Things I built for the community.</h1>
    <div class="mt-10 grid grid-cols-1 lg:grid-cols-2 gap-8">
        @foreach ($this->packages as $package)
            <div class="relative flex flex-col px-5 py-8 border border-zinc-800 hover:border-zinc-700 hover:bg-zinc-950 transition-colors rounded-xl">
                <a href="{{ $package->repository }}" target="_blank" rel="noopener noreferrer" class="transition-all absolute inset-0"></a>
                <h3 class="text-zinc-100 text-xl font-medium mb-5 leading-tight">{{ $package->name }}</h3>
                <div class="h-full flex flex-col">
                    <p class="mb-24 text-base text-zinc-400">{{ $package->description }}</p>
                    <div class="flex items-center gap-x-5 mt-auto">
                        <span class="text-sm text-zinc-100 flex items-center gap-x-2">
                            <svg class="w-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 14"><path fill="#EAE8E5" d="m11 6-5 5-5-5V5h3V0h4v5h3v1ZM1 12h11v2H0v-2h1Z"></path></svg>
                            <span>{{ Number::format($package->downloads) }}</span>
                        </span>
                        <span class="text-sm text-zinc-100 flex items-center gap-x-2">
                            <svg class="w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16"><path fill="#EAE8E5" d="m9.003 0 2.703 5.125 5.71.987-4.04 4.154L14.2 16l-5.197-2.556L3.803 16l.825-5.734L.591 6.112l5.706-.987L9.003 0Z"></path></svg>
                            <span>{{ Number::format($package->github_stars) }}</span>
                        </span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
