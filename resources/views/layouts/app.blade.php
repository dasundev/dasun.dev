<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title'){{ $title ?? config('app.name', 'dasun.dev') }}</title>

    {!! SEO::generate() !!}

    <!-- Fonts -->
    @googlefonts
    @googlefonts('overpass')

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased dark:selection:text-white dark:selection:bg-primary-900 bg-white dark:bg-black">
    <header class="bg-white dark:bg-black">
        <nav x-data="{ open: false }" x-init="$watch('open', value => {
            value
                ?
                $refs.links.style.display = 'inline-flex' :
                $refs.links.style.display = 'none'
        })"
            class="relative max-w-7xl mx-auto flex-col justify-center items-center p-0 lg:p-5">
            <div class="flex justify-between flex-wrap lg:flex-nowrap items-center w-full">
                <div class="p-5 lg:p-0 order-none lg:order-1">
                    <a href="/" class="text-2xl font-normal dark:text-white" wire:navigate.hover>dasun.dev</a>
                </div>
                <div class="flex items-center order-none lg:order-3">
                    <button type="button" @click="$store.darkMode.toggle()"
                        class="bg-gray-50 dark:bg-gray-800 hover:dark:bg-gray-700 hover:bg-gray-100 cursor-pointer text-yellow-500 p-2 rounded-full">
                        <svg x-data xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path x-show="!$store.darkMode.on" stroke-linecap="round" stroke-linejoin="round"
                                d="M21.752 15.002A9.72 9.72 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z" />
                            <path x-cloak x-show="$store.darkMode.on" stroke-linecap="round" stroke-linejoin="round"
                                d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" />
                        </svg>
                    </button>
                    <button type="button" class="block lg:hidden p-5 lg:p-0" @click="open = !open">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor"
                            class="w-7 h-7 transition-all duration-300 scale-90 text-black dark:text-white"
                            :class="open ? 'rotate-90' : 'rotate-[-45]'">
                            <path x-show="!open" stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            <path x-cloak x-show="open" stroke-linecap="round" stroke-linejoin="round"
                                d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div x-ref="links"
                    class="order-none lg:order-2 hidden lg:inline-flex justify-center flex-col lg:flex-row gap-x-0 lg:gap-x-6 h-full w-full">
                    <a class="text-md inline-flex leading-none items-center font-light hover:text-gray-600 dark:hover:text-gray-300 border-b border-gray-100 dark:border-gray-900 first:border-t lg:first:border-0 lg:border-0 px-6 py-6 lg:p-0 {{ request()->is('open-source') ? 'text-black font-normal dark:text-white bg-gray-50 lg:bg-white dark:bg-gray-900 lg:dark:bg-black' : 'text-gray-500 dark:text-gray-400' }}"
                        href="{{ route('open-source.index') }}" wire:navigate.hover>Open Source</a>
                    <a class="text-md inline-flex leading-none items-center font-light hover:text-gray-600 dark:text-gray-400 dark:hover:text-gray-300 border-b border-gray-100 dark:border-gray-900 lg:border-0 px-6 py-6 lg:p-0 {{ request()->is('blog', 'blog/*') ? 'text-black font-normal dark:text-white bg-gray-50 lg:bg-white dark:bg-gray-900 lg:dark:bg-black' : 'text-gray-500 dark:text-gray-400' }}"
                        href="{{ route('blog') }}" wire:navigate.hover>Blog</a>
                    <a class="text-md inline-flex leading-none items-center font-light hover:text-gray-600 dark:text-gray-400 dark:hover:text-gray-300 border-b border-gray-100 dark:border-gray-900 lg:border-0 px-6 py-6 lg:p-0 {{ request()->is('about') ? 'text-black font-normal dark:text-white bg-gray-50 lg:bg-white dark:bg-gray-900 lg:dark:bg-black' : 'text-gray-500 dark:text-gray-400' }}"
                        href="{{ route('about') }}" wire:navigate.hover>About</a>
                </div>
            </div>
        </nav>
    </header>

    {{ $slot }}

    <footer class="dark:bg-black">
        <div class="max-w-7xl mx-auto border-t border-gray-100 dark:border-gray-900 py-5 px-5 lg:px-0 dark:bg-black">
            <p class="text-gray-500 text-xs lg:text-sm">
                Copyright © 2020-{{ now()->format('Y') }}. All Rights Reserved.
            </p>
            <p class="text-gray-500 text-xs lg:text-sm mt-2">
                Code highlighting provided by <a href="https://torchlight.dev/" target="_blank"
                    class="underline duration-300 transition-colors dark:hover:text-gray-400">Torchlight</a>
            </p>
        </div>
    </footer>

    @livewireScripts

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('darkMode', {
                on: Alpine.$persist(false).as('darkMode_on'),

                toggle() {
                    this.on = !this.on
                },
            })

            Alpine.effect(() => {
                const darkMode = Alpine.store('darkMode').on;

                if (darkMode) {
                    document.documentElement.classList.add('dark')
                } else {
                    document.documentElement.classList.remove('dark')
                }
            })
        })
    </script>
</body>

</html>
