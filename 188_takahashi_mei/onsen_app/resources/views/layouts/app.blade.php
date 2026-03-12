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

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- スライダー読み込み -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
</head>


@props(['bg' => null])

<body
    class="min-h-screen flex flex-col font-sans antialiased text-[#374151]{{ isset($bg) && str_starts_with($bg, 'images') ? 'bg-cover bg-center' : '' }}"
    @isset($bg) @if(str_starts_with($bg, 'images')) style="
        background-image: url('{{ asset($bg) }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    " @else style="background-color: {{ $bg }};" @endif @endisset>
    <x-header />
    {{-- @include('layouts.navigation')--}}

    <!-- Page Heading -->
    @isset($header)
        <header class="relative bg-cover bg-center text-gray-100 ">
            <div class="absolute inset-0 bg-[#FED7AA]"></div>
            <div class="relative
                        max-w-7xl mx-auto
                        py-2 px-5
                        text-base
                        text-[#374151]">
                {{ $header }}
            </div>
        </header>
    @endisset

    <!-- Page Content -->
    <main class="flex-grow container mx-auto px-3">
        {{ $slot }}
    </main>
    </div>
    <x-footer />
    <!-- スライダーJS読み込み -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
</body>

</html>