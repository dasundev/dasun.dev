<div x-data="{ open: false }" x-init="$watch('open', value => console.log(value))" class="my-8 flex justify-between">
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
            <div class="fixed inset-x-4 top-8 z-10 origin-top rounded-3xl p-8 ring-1 bg-zinc-950 ring-zinc-800">
                <div class="flex flex-row-reverse items-center justify-between">
                    <button aria-label="Close menu" class="-m-1 p-1" type="button" @click="open = !open">
                        <svg viewBox="0 0 24 24" aria-hidden="true" class="h-6 w-6 text-zinc-500 dark:text-zinc-400">
                            <path d="m17.25 6.75-10.5 10.5M6.75 6.75l10.5 10.5" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </button>
                    <h2 class="text-sm font-medium text-zinc-400">Navigation</h2>
                </div>
                <ul class="mt-6 -my-2 divide-y text-base divide-zinc-100/10 text-zinc-300">
                    <li><a class="block py-2" href="{{ route('about') }}">About</a></li>
                    <li><a class="block py-2" href="{{ route('blog') }}">Blog</a></li>
                    <li><a class="block py-2" href="{{ route('open-source') }}">Open Source</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <button aria-label="Open menu" class="block lg:hidden" type="button" @click="open = !open">
        <span class="inset-0 absolute size-10"></span>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-zinc-100 size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
        </svg>
    </button>
</div>
