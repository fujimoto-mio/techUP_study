@extends('layouts.app')

@section('og_title', 'GLOBE NATION | ' . $post->title)
@section('og_description', $post->content)
@section('og_type', 'article')
@section('og_url', url()->current())
@section('og_image', asset('images/default-ogp.png'))

@section('meta_description', $post->content)

@section('title', 'GLOBE NATION | ' . $post->title)

@push('head')
    @vite('resources/css/front/newsblog/show.css')
@endpush

@section('content')
<section class="news-show">
    <div class="container">

        <!-- タイトル -->
        <h1 class="post-title">{{ $post->title }}</h1>

        <!-- メタ情報 -->
        <div class="post-meta">
            <span class="post-date">{{ $post->created_at->format('Y-m-d') }}</span>
            @if($post->type)
                <span class="post-type">{{ strtoupper($post->type) }}</span>
            @endif
            @if($post->service)
                <span class="post-service">{{ strtoupper($post->service) }}</span>
            @endif
        </div>

        <!-- 画像 -->
        @if ($post->image_path)
            <div class="post-image">
                <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }}">
            </div>
        @endif

        <!-- 本文 -->
        <div class="post-content">
            {!! $post->content !!}
        </div>

        <!-- 戻るリンク -->
        <div class="back-link">
            <a href="{{ route('front.newsblog.index', ['lang' => app()->getLocale()]) }}">一覧に戻る</a>
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
    <a href="{{ route('front.contact.show', ['lang' => app()->getLocale()]) }}" class="cta_button">お問い合わせはこちら</a>
</section>

@endsection
