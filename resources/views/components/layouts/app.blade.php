<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @php
        $title = isset($title) ? $title . ' - Dasun Tharanga' : 'Dasun Tharanga - Full-stack Laravel Developer';
    @endphp

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description" content="{{ $description }}">

    <meta name="og:type" content="website">
    <meta name="og:url" content="{{ url()->current() }}">
    <meta name="og:image" content="{{ asset('assets/social.png') }}">
    <meta name="og:title" content="{{ $title }}">
    <meta name="og:description" content="{{ $description }}">

    <meta name="twitter:title" content="{{ $title }}" />
    <meta name="twitter:description" content="{{ $description }}" />
    <meta name="twitter:image" content="{{ asset('assets/social.png') }}" />

    <script type="application/ld+json">{"@context":"https://schema.org","@type":"WebPage","url":"{{ url()->current() }}"}</script>

    <title>{{ $title }}</title>

    <link rel="shortcut icon" href="{{ asset('assets/favicon-16x16.png') }}" sizes="16x16" type="image/png">
    <link rel="shortcut icon" href="{{ asset('assets/favicon-32x32.png') }}" sizes="32x32" type="image/png">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:300,400,500,600,700,800,900" rel="stylesheet"/>

    @include('feed::links')

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @if(app()->isProduction() && !(auth()->check() && auth()->user()->email === 'hello@dasun.dev'))
        <script defer src="https://cloud.umami.is/script.js" data-website-id="572bed05-7902-4fce-85ab-acd4f1cf8253"></script>
    @endif
</head>
<body class="min-h-screen flex flex-col items-start font-display bg-zinc-900 antialiased">
    <header class="max-w-6xl mx-auto px-8 lg:px-18 w-full sticky top-0 z-10 bg-zinc-900">
        @include('components.layouts.navigation')
    </header>
    <main class="max-w-6xl mx-auto px-8 lg:px-18 flex flex-1 flex-col w-full">
        {{ $slot }}
    </main>
    <footer class="max-w-6xl mx-auto px-8 lg:px-18 pb-10 pt-16 w-full">
        <p class="text-xs md:text-sm text-zinc-400 leading-normal">© 2020 - {{ now()->year }} Dasun Tharanga. This website is open source.</p>
    </footer>
</body>
</html>
