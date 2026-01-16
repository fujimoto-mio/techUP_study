<footer class="site-footer">
    <div class="footer_inner container">

        {{-- =======================================
            ① ロゴ（左固定）
        ======================================== --}}
        <div class="footer_logo">
            <a href="{{ url(app()->getLocale()) }}">
                <img src="{{ asset('images/GN_LOGO_WhiteTITLE.svg') }}" alt="GLOBE NATION" width="140">
            </a>
        </div>

        {{-- =======================================
            ② メニューエリア（4カラム）
        ======================================== --}}
        <div class="footer_nav">

            {{-- Column 1 --}}
            <div class="footer_col">
                <a href="{{ url(app()->getLocale()) }}">TOP</a>
                <a href="{{ route('front.about.index', app()->getLocale()) }}">ABOUT US</a>
            </div>

            {{-- Column 2 --}}
            <div class="footer_col">
                <a href="#solutions">OUR SOLUTIONS</a>
                <a href="{{ route('front.gnmedia', app()->getLocale()) }}">└ GN MEDIA</a>
                <a href="{{ route('front.gnstudio', app()->getLocale()) }}">└ GN STUDIO</a>
                <a href="{{ route('front.gnacademy', app()->getLocale()) }}">└ GN ACADEMY</a>
            </div>

            {{-- Column 3 --}}
            <div class="footer_col">
                <a href="{{ route('front.newsblog.index', app()->getLocale()) }}">NEWS & BLOG</a>
                <a href="{{ route('front.works.index', app()->getLocale()) }}">WORKS</a> 
            </div>

            {{-- Column 4 --}}
            <div class="footer_col">
                <a href="{{ route('front.contact.show', app()->getLocale()) }}">CONTACT</a>
            </div>

        </div>
    </div>

    {{-- =======================================
        ③ SNS + コピーライト（中央寄せ）
    ======================================== --}}
    <div class="footer_bottom">
        {{-- SNSアイコン --}}
        <div class="footer_sns">
            <a href="https://www.youtube.com/@GLOBENATIONMEDIA" target="_blank" class="footer_sns-item">@include('icons.youtube')</a>
            <a href="https://www.instagram.com/globe.nation" target="_blank" class="footer_sns-item">@include('icons.instagram')</a>
            <a href="https://www.tiktok.com/@globe.nation" target="_blank" class="footer_sns-item">@include('icons.tiktok')</a>
            <a href="https://www.facebook.com/WeAreGLOBENATION/" target="_blank" class="footer_sns-item">@include('icons.facebook')</a>
            <a href="https://x.com/globe_nation" target="_blank" class="footer_sns-item">@include('icons.x')</a>
        </div>

        {{-- コピーライト（自動反映） --}}
        <small class="footer_copy">
            © {{ now()->year }} GLOBE NATION
        </small>
    </div>
</footer>
