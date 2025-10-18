<?php

use App\Models\Package;
use App\Services\Documentation;
use Livewire\Attributes\Computed;
use Livewire\Volt\Component;
use Livewire\Attributes\Url;

new class extends Component {

    #[Url]
    public string $package;

    public string $slug;

    private Documentation $documentation;

    public function mount(Documentation $documentation): void
    {
        $this->documentation = $documentation;
    }

    #[Computed]
    public function navigation()
    {
        return $this->documentation->getNavigation($this->package);
    }

    #[Computed]
    public function page()
    {
        return $this->documentation->getPage($this->slug);
    }

    public function render(): mixed
    {
        return view('pages.docs')
            ->title("{$this->page->title} | {$this->package}")
            ->layoutData(['description' => $this->package]);
    }
}
?>


<div>
    <h1 class="text-zinc-100 text-4xl md:text-5xl font-bold tracking-tight leading-normal mt-8">{{ $this->package }}</h1>
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 w-full mt-10">
        <aside class="col-span-full lg:col-span-3">
            <div class="sticky top-24 space-y-5">
                @foreach($this->navigation as $key => $section)
                    <ul class="border-b last:border-none border-zinc-800 pb-5">
                        <li>
                            <h2 class="text-sm text-zinc-400 uppercase font-bold">{{ $section['_index']['title'] }}</h2>
                            <ul class="mt-4 space-y-2.5 text-zinc-300 relative">
                                @foreach($section['pages'] as $page)
                                    <li class="relative">
                                        <a href="{{ route('docs', ['slug' => $page->slug]) }}" class="hover:text-zinc-100" wire:current="text-zinc-100 font-semibold before:border-l-2 before:border-primary before:absolute before:inset-0 before:-left-2" wire:navigate>{{ $page->title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                @endforeach
            </div>
        </aside>
        <article class="markdown col-span-full lg:col-span-7 prose prose-invert">
            {!! $this->page->contents !!}
        </article>
        <aside class="col-span-full lg:col-span-2">
            <div class="relative inline-block sticky top-24 text-zinc-100 block font-medium text-xs text-center rounded-xl bg-zinc-800 px-4 py-3 transition hover:bg-zinc-700">
                <a href="https://github.com/sponsors/dasundev" target="_blank" class="absolute inset-0"></a>
                Your logo here?
            </div>
        </aside>
    </div>
</div>
