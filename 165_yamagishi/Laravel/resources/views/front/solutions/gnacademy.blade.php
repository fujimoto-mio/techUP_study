{{-- resources/views/front/solutions/gnacademy.blade.php --}}
@extends('layouts.app')

{{-- OGP・SEO設定 --}}
@section('og_title', 'GLOBE NATION ACADEMY')
@section('og_description', 'GLOBE NATIONの教育・コンサルティング事業です。')
@section('og_type', 'website')
@section('og_url', url()->current())
@section('og_image', asset('images/default-ogp.png'))

@section('meta_description', 'GLOBE NATIONの教育・コンサルティング事業です。')

@section('title', 'GLOBE NATION ACADEMY')

@push('head')
    @vite('resources/css/front/solutions/gnacademy.css')
@endpush

@section('header')
@include('layouts.header')
@endsection

@section('content')
{{-- ===============================
    HERO SECTION
================================--}}
<section class="gnacademy-hero">
    <div class="gnacademy-hero_inner">
        <p class="gnacademy-hero_title">教育・コンサルティング事業</p>
        <h1 class="gnacademy-hero_subtitle font-roboto">GLOBE NATION ACADEMY</h1>
    </div>
</section>

{{-- ===============================
    MESSAGE SECTION
================================--}}
<section id="gnacademy-message" class="gnacademy-message-section">
    <div class="gnacademy-message-section_inner">
        <h2 class="gnacademy-message-title">Coming soon...</h2>
        <p class="gnacademy-message-sub">準備中です</p>
        <div class="gnacademy-message">
            <p>
                GN ACADEMYでは、SDGs/CSR・国際協力・社会的企業などに関わる教育事業や、<br>
                コンサルティング事業の展開を予定しています。
            </p>                                
        </div>
        <div class="gnacademy-related">
            <h3 class="gnacademy-related-title">
                【日本語教育事業】<span>Max’s Japanese</span>
            </h3>
            <p class="gnacademy-related-link">
                YouTube：
                <a href="https://youtube.com/@maxsjapanese" target="_blank" rel="noopener">
                    https://youtube.com/@maxsjapanese
                </a>
            </p>
        </div>
    </div>
</section>

{{-- FOLLOW US --}}
<section id="follow" class="follow-section js-fade-section follow">
    <div class="follow-section_inner">
        <div class="section_header follow_header">
            <h2 class="section_title-bg" aria-hidden="true">SOCIAL MEDIA</h2>
            <h2 class="section_title-en">SOCIAL MEDIA</h2>
            <p class="section_title-ja">公式アカウント</p>
        </div>    
        <h2 class="follow-us">FOLLOW US</h2>
        <div class="follow_icons">
            <a href="https://www.youtube.com/@GLOBENATIONMEDIA" target="_blank" class="follow_icon">@include('icons.youtube')</a>
            <a href="https://www.instagram.com/globe.nation" target="_blank" class="follow_icon">@include('icons.instagram')</a>
            <a href="https://www.tiktok.com/@globe.nation" target="_blank" class="follow_icon">@include('icons.tiktok')</a>
            <a href="https://www.facebook.com/WeAreGLOBENATION/" target="_blank" class="follow_icon">@include('icons.facebook')</a>
            <a href="https://x.com/globe_nation" target="_blank" class="follow_icon">@include('icons.x')</a>
        </div>
    </div>    
</section>

{{-- CTA --}}
<section id="cta" class="cta-section">
    <p class="cta_text">
        気になることや、考えていること、<br>
        何でもお気軽にご相談ください
    </p>
    <a href="{{ route('front.contact.show', ['lang' => $lang]) }}" class="cta_button">お問い合わせはこちら</a>
</section>

@endsection

{{-- ===== ページ専用 JS ===== --}}
@push('scripts')
    @vite('resources/js/front/solutions/gnacademy.js')
@endpush
