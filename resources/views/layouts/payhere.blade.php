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

<body class="antialiased flex flex-col items-center justify-center h-screen dark:selection:text-white dark:selection:bg-primary-900 bg-white dark:bg-black">
<div id="search" class="hidden"></div>

@yield('content')

<div class="mt-10 text-gray-500 text-xs md:text-sm">
    Powered by <a href="https://dasun.dev/docs/laravel-payhere" target="_blank" class="text-primary-700">Payoora</a>
</div>

@livewireScriptConfig

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
