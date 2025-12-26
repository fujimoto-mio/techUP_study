@extends('layouts.app')

@section('og_title', 'GLOBE NATION | WORKS | ' . $work->title)
@section('og_description', $work->content)
@section('og_type', 'article')
@section('og_url', url()->current())
@section('og_image', asset('images/default-ogp.png'))

@section('meta_description', $work->content)

@section('title', 'GLOBE NATION | WORKS | ' . $work->title)

@push('head')
    @vite('resources/css/front/works/show.css')
@endpush

@section('content')

{{-- ===============================
    HERO
================================ --}}
<section class="work-show-hero">
    <div class="container">
        <span class="work-show-category">{{ strtoupper($work->type) }}</span>
        <h1 class="work-show-title">{{ $work->title }}</h1>
        <p class="work-show-date">{{ $work->created_at->format('Y.m.d') }}</p>
    </div>
</section>

{{-- ===============================
    CONTENT
================================ --}}
<section class="work-show-content">
    <div class="container">

        {{-- YouTube --}}
        @if($work->youtube_url)
            @php
                $youtube_id = null;

                if (preg_match('~youtu\.be/([^\?]+)~', $work->youtube_url, $m)) {
                    $youtube_id = $m[1];
                } elseif (preg_match('~v=([^\&]+)~', $work->youtube_url, $m)) {
                    $youtube_id = $m[1];
                } elseif (preg_match('~/embed/([^\?]+)~', $work->youtube_url, $m)) {
                    $youtube_id = $m[1];
                }
            @endphp

            @if($youtube_id)
                <div class="work-show-video">
                    <iframe
                        src="https://www.youtube.com/embed/{{ $youtube_id }}"
                        title="{{ $work->title }}"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen>
                    </iframe>
                </div>
            @endif
        @endif

        {{-- Meta --}}
        <div class="work-show-meta">
            @if($work->service)
                <span class="meta-item">{{ strtoupper($work->service) }}</span>
            @endif

            @if($work->tags)
                @foreach(explode(',', $work->tags) as $tag)
                    <span class="meta-tag">{{ trim($tag) }}</span>
                @endforeach
            @endif
        </div>

        {{-- Body --}}
        @if($work->content)
            <div class="work-show-body">
                {!! nl2br(e($work->content)) !!}
            </div>
        @endif

        {{-- Back --}}
        <div class="work-show-back">
            <a href="{{ route('front.works.index', ['lang' => app()->getLocale()]) }}">
                ← 一覧に戻る
            </a>
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