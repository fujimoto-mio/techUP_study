@php
    $lang = $lang ?? request()->route('lang') ?? 'ja';
@endphp

<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    {{-- ページタイトル --}}
    <title>@yield('title', 'GLOBE NATION')</title>

    {{-- ▼ OGPタグ --}}
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:site_name" content="GLOBE NATION">
    <meta property="og:locale" content="ja_JP">
    <meta property="og:title" content="@yield('og_title', 'GLOBE NATION')">
    <meta property="og:description" content="@yield('og_description', 'サイトの説明')">
    <meta property="og:url" content="@yield('og_url', url()->current())">
    <meta property="og:image" content="@yield('og_image', asset('images/default-ogp.png'))">

    {{-- ▼ Twitterカード --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('og_title', 'GLOBE NATION')">
    <meta name="twitter:description" content="@yield('og_description', 'サイトの説明')">
    <meta name="twitter:image" content="@yield('og_image', asset('images/default-ogp.png'))">

    {{-- ▼ SEO --}}
    <meta name="description" content="@yield('meta_description', '検索結果用ディスクリプション')">
    <meta name="keywords" content="@yield('meta_keywords', 'キーワード1,キーワード2')">

    {{-- ▼ ファビコン --}}
    <link rel="icon" type="image/png" sizes="512x512" href="{{ asset('images/favicon-512.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/favicon-512.png') }}">

    {{-- 共通CSS --}}
    @vite(['resources/css/front/common.css'])

    {{-- ページ固有CSS --}}
    @stack('head')
</head>


<body class="@yield('body_class')">

    {{-- TOPページ専用背景動画 --}}
    @yield('top-bg-video')

    {{-- ヘッダー --}}
    @hasSection('header')
        @yield('header')
    @else
        @include('layouts.header')
    @endif

    <main id="app" class="app">
        @if(session('success'))
            <div class="flash-success">{{ session('success') }}</div>
        @endif

        @yield('content')
    </main>

    {{-- フッター --}}
    @include('layouts.footer')

    {{-- 共通 JS --}}
    @vite(['resources/js/front/app.js'])

    {{-- ページ固有 JS --}}
    @stack('scripts')

</body>
</html>
