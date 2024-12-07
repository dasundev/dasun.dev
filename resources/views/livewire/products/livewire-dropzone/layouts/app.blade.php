<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', $title ?? config('app.name', 'dasun.dev'))</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ url(asset('favicon.ico')) }}">

    {!! SEO::generate() !!}

    @include('feed::links')

    <!-- Fonts -->
    @googlefonts
    @googlefonts('overpass')

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased dark:selection:text-white dark:selection:bg-primary-900 bg-white dark:bg-black">
@livewire('products.livewire-dropzone.layouts.navigation')

@isset($header)
    <header class="border-t border-gray-100 dark:border-gray-900">
        <div class="max-w-7xl mx-auto p-5 mt-5">
            {{ $header }}
        </div>
    </header>
@endisset

{{ $slot }}

<footer class="max-w-7xl mx-auto dark:bg-black mt-10">
    <div class="flex flex-wrap justify-between border-t border-gray-100 dark:border-gray-900 py-5 mx-5 lg:mx-0 dark:bg-black">
        <div>
            <p class="text-gray-500 text-xs lg:text-sm">
                Copyright © 2020-{{ now()->format('Y') }}. All Rights Reserved.
            </p>
            <p class="text-gray-500 text-xs lg:text-sm mt-2">
                Code highlighting provided by <a href="https://torchlight.dev/" target="_blank"
                                                 class="underline duration-300 transition-colors dark:hover:text-gray-400">Torchlight</a>
            </p>
        </div>
        <div class="inline-flex gap-3 mt-3 lg:mt-0 text-gray-500 items-center">
            <a class="text-gray-500 hover:text-gray-600 text-xs lg:text-sm dark:hover:text-gray-400" href="{{ route('terms-of-condition') }}" wire:navigate.hover>Terms and Conditions</a>
            ·
            <a class="text-gray-500 hover:text-gray-600 text-xs lg:text-sm dark:hover:text-gray-400" href="{{ route('refund-policy') }}" wire:navigate.hover>Refund Policy</a>
            ·
            <a class="text-gray-500 hover:text-gray-600 text-xs lg:text-sm dark:hover:text-gray-400" href="{{ route('privacy-policy') }}" wire:navigate.hover>Privacy Policy</a>
        </div>
    </div>
</footer>

@livewireScriptConfig

<script>
    if (localStorage.getItem('darkMode_on') === 'true' || (!('darkMode_on' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.querySelector('html').classList.add('dark');
    } else {
        document.querySelector('html').classList.remove('dark');
    }

    document.addEventListener('alpine:init', () => {
        Alpine.store('darkMode', {
            on: Alpine.$persist(true).as('darkMode_on'),

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

@if (app()->isProduction())
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-DF0M53ZHLF"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-DF0M53ZHLF');
        gtag('config', 'AW-737176690');
    </script>
@endif
</body>

</html>
