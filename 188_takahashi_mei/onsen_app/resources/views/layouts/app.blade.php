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

<body class="font-sans antialiased {{ isset($bg) ? 'bg-cover bg-center' : '' }}"
      @isset($bg)
          style="background-image: url('{{ $bg }}');
                 background-size: cover;
                 background-position: center;
                 background-repeat: no-repeat;"
      @endisset
>
    <x-header />
    @include('layouts.navigation')

    <!-- Page Heading -->
    @isset($header)
        <header class="bg-stone-500 text-gray-100 dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endisset

    <!-- Page Content -->
    <main class="container mx-auto px-4 py-6">
        {{ $slot }}
    </main>
    </div>
    <x-footer />
    <!-- スライダーJS読み込み -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
</body>

</html>