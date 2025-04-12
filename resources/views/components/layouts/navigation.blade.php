<div x-data="{ open: false }" x-init="$watch('open', value => console.log(value))" class="my-5 lg:my-8 flex justify-between">
    <nav class="flex justify-between w-full items-center">
        <a class="text-xl md:text-2xl font-normal text-zinc-100" href="/" wire:navigate>dasun.dev</a>
        <!-- Desktop Navigation -->
        <ul class="lg:flex gap-8 hidden text-zinc-300">
            <li><a href="{{ route('about') }}" class="text-base font-normal hover:text-zinc-100 transition-colors" wire:current.exact="text-zinc-100" wire:navigate>About</a></li>
            <li><a href="{{ route('blog') }}" class="text-base font-normal hover:text-zinc-100 transition-colors" wire:current="text-zinc-100" wire:navigate>Blog</a></li>
            <li><a href="{{ route('open-source') }}" class="text-base font-normal hover:text-zinc-100 transition-colors" wire:current.exact="text-zinc-100" wire:navigate>Open Source</a></li>
        </ul>
        <!-- Mobile Navigation -->
        <div class="w-full absolute hidden" :class="{ 'hidden' : !open }">
            <div class="fixed inset-x-0 top-17 z-10 origin-top bg-zinc-900 shadow-xl shadow-zinc-950">
                <ul class="text-base text-zinc-300">
                    <li><a class="block py-5 px-8 first:border-t border-b border-zinc-800" href="{{ route('about') }}" wire:current.exact="text-zinc-100" wire:navigate>About</a></li>
                    <li><a class="block py-5 px-8 border-b border-zinc-800" href="{{ route('blog') }}" wire:current.exact="text-zinc-100" wire:navigate>Blog</a></li>
                    <li><a class="block py-5 px-8 border-b border-zinc-800" href="{{ route('open-source') }}" wire:current.exact="text-zinc-100" wire:navigate>Open Source</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <button aria-label="Open menu" class="block lg:hidden" type="button" @click="open = !open">
        <span class="inset-0 absolute size-10"></span>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-zinc-100 size-6">
            <path x-transition x-show="!open" stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            <path x-transition x-show="open" x-cloak stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
        </svg>
    </button>
</div>
