<header class="site-header">

    @php
        $currentLang = request()->route('lang') ?? app()->getLocale();
    @endphp

    {{-- 左：ロゴ --}}
    <div class="site-header_logo">
        <a href="{{ route('front.home', ['lang' => $currentLang]) }}" class="site-header_logo-link">
            <img src="{{ asset('images/GN_Logo_Black.svg') }}" alt="GLOBE NATION Logo" width="48">
            <span class="site-header_logo-text">GLOBE NATION</span>
        </a>
    </div>

    {{-- 右：メニュー＋言語切替 --}}
    <div class="nav-right">

        {{-- メインメニュー --}}
        <nav class="main-menu js-main-menu">
            <ul class="menu-contents">
                <li class="menu-item">
                    <a href="{{ route('front.home', ['lang' => $currentLang]) }}" class="page-link">TOP</a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('front.about.index', ['lang' => $currentLang]) }}" class="page-link">ABOUT US</a>
                </li>

                {{-- ▼ OUR SOLUTIONS（ドロップダウン） --}}
                <li class="menu-item dropdown">
                    <a href="{{ route('front.home', ['lang' => $currentLang]) }}#solutions" class="page-link">
                        OUR SOLUTIONS
                        <span class="arrow">▼</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('front.gnmedia', ['lang' => $currentLang]) }}" class="dropdown-link">GN MEDIA</a></li>
                        <li><a href="{{ route('front.gnstudio', ['lang' => $currentLang]) }}" class="dropdown-link">GN STUDIO</a></li>
                        <li><a href="{{ route('front.gnacademy', ['lang' => $currentLang]) }}" class="dropdown-link">GN ACADEMY</a></li>
                    </ul>
                </li>

                <li class="menu-item">
                    <a href="{{ route('front.newsblog.index', ['lang' => $currentLang]) }}" class="page-link">NEWS & BLOG</a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('front.contact.show', ['lang' => $currentLang]) }}" class="page-link">CONTACT</a>
                </li>
            </ul>
        </nav>

        {{-- 言語切替 --}}
        <div class="site-header_lang">
            <a href="{{ url('ja') }}" class="{{ $currentLang === 'ja' ? 'is-active' : '' }}">JP</a> /
            <a href="{{ route('coming.soon.en') }}" class="is-disabled">EN</a>
        </div>

    </div>
    
    <!-- ハンバーガーボタン（スマホ用） -->
    <div class="burger-btn js-burger">
        <span></span>
        <span></span>
        <span></span>
    </div>
    {{-- ▼ スマホ専用メニュー（ここに追記） --}}
        <div class="mobile-menu">
            <ul>
                <li><a href="{{ route('front.home', ['lang' => $currentLang]) }}">TOP</a></li>
                <li><a href="{{ route('front.about.index', ['lang' => $currentLang]) }}">ABOUT US</a></li>
                <li><a href="{{ route('front.home', ['lang' => $currentLang]) }}#solutions">OUR SOLUTIONS</a></li>
                <li><a href="{{ route('front.gnmedia', ['lang' => $currentLang]) }}">└ GN MEDIA</a></li>
                <li><a href="{{ route('front.gnstudio', ['lang' => $currentLang]) }}">└ GN STUDIO</a></li>
                <li><a href="{{ route('front.gnacademy', ['lang' => $currentLang]) }}">└ GN ACADEMY</a></li>
                </li>
                <li><a href="{{ route('front.newsblog.index', ['lang' => $currentLang]) }}">NEWS & BLOG</a></li>
                <li><a href="{{ route('front.contact.show', ['lang' => $currentLang]) }}">CONTACT</a></li>
                <li style="margin-top: 30px;">
                    <a href="{{ url('ja') }}" class="{{ $currentLang === 'ja' ? 'is-active' : '' }}">JP</a> /
                    <a href="{{ route('coming.soon.en') }}" class="is-disabled">EN</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- メニューオーバーレイ -->
    <div class="menu-overlay js-menu-overlay"></div>

</header>


