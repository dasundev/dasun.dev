<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="bg-black">
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

    <script type="application/ld+json">{"@context":"https://schema.org","@type":"WebPage","url":"{{ url()->current() }}"}</script>

    <title>{{ $title }}</title>

    <link rel="shortcut icon" href="{{ asset('assets/favicon-16x16.png') }}" sizes="16x16" type="image/png">
    <link rel="shortcut icon" href="{{ asset('assets/favicon-32x32.png') }}" sizes="32x32" type="image/png">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:300,400,500,600,700,800,900" rel="stylesheet"/>

    @include('feed::links')

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="max-w-6xl px-8 lg:px-18 min-h-screen mx-auto flex flex-col items-start font-display bg-black antialiased">
    <header class="w-full">
        @include('components.layouts.navigation')
    </header>
    <main class="flex flex-1 flex-col w-full">
        {{ $slot }}
    </main>
    <footer class="pb-10 pt-12 w-full">
        <p class="text-xs md:text-sm text-zinc-400 leading-normal">© 2020 - {{ now()->year }} Dasun Tharanga. This website is open source.</p>
    </footer>
</body>
</html>
