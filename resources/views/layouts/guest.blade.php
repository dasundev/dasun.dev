<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Fonts -->
        @googlefonts
        @googlefonts('overpass')

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div id="docsearch"></div>
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-50 dark:bg-black">
            <div class="w-full sm:max-w-md mt-6 px-8 py-6 bg-white dark:bg-black overflow-hidden border border-gray-100 dark:border-gray-900 rounded-md">
                {{ $slot }}
            </div>
        </div>

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
