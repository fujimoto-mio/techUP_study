<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>

    {{-- 共通 CSS --}}
    @vite([
        'resources/css/admin/common.css',
    ])

    {{-- ページ別 CSS --}}
    @stack('head')
</head>
<body class="admin-body">

    {{-- ヘッダー／ナビ --}}
    @include('admin.partials.nav')

    <div class="admin-container">
        <main class="admin-main">
            @yield('content')
        </main>
    </div>
    
    {{-- ▼ ファビコン --}}
    <link rel="icon" type="image/png" sizes="512x512" href="{{ asset('images/favicon-512.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/favicon-512.png') }}">

    {{-- 共通 JS --}}
    @vite([
        'resources/js/admin/app.js'
    ])

    {{-- ページ別 JS --}}
    @stack('scripts')
</body>
</html>
