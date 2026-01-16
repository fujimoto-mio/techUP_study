<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    
    {{-- ▼ ファビコン --}}
    <link rel="icon" type="image/png" sizes="512x512" href="{{ asset('images/favicon-512.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/favicon-512.png') }}">

    {{-- 管理画面 共通CSS / JS --}}
    @vite([
        'resources/css/admin/common.css',
        'resources/js/admin/app.js'
    ])

    {{-- ページ個別CSS --}}
    @stack('head')
</head>
<body class="admin-body">

    <div class="admin-container">
        {{-- メインコンテンツ --}}
        <main class="admin-main">
            @yield('content')
        </main>
    </div>

</body>
</html>