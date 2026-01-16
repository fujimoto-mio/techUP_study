@extends('layouts.app')

{{-- OGP・SEO設定 --}}
@section('og_title', 'NEWS & BLOG | GLOBE NATIONの最新情報 & ブログ記事')
@section('og_description', 'GLOBE NATIONからのお知らせや最新情報、ブログ記事などの一覧')
@section('og_type', 'website')
@section('og_url', url()->current())
@section('og_image', asset('images/default-ogp.png'))

@section('meta_description', 'GLOBE NATIONからのお知らせや最新情報、ブログ記事などの一覧')
@section('meta_keywords', '社会課題, 社会問題, 映像制作, 動画制作, ...')

@section('title', ' NEWS & BLOG | GLOBE NATIONの最新情報 & ブログ記事')

@push('head')
    @vite('resources/css/front/newsblog/newsblog.css')
@endpush

@section('header')
@includeIf('layouts.header')
@endsection

@section('content')

{{-- HERO SECTION --}}
<section class="newsblog-hero">
    <div class="newsblog-hero_inner">
        <p class="newsblog-hero_title">NEWS / BLOG</p>
    </div>
</section>

{{-- FILTER / TAG SECTION --}}
<section class="newsblog-filter">
    <div class="container">
        <form action="{{ route('front.newsblog.index', ['lang'=>app()->getLocale()]) }}" method="GET" class="filter-form-card">
            {{-- ジャンル --}}
            <div class="filter-group">
                <label for="genre">ジャンル</label>
                <select name="genre" id="genre">
                    <option value="">ALL</option>
                    <option value="news" {{ request('genre')=='news' ? 'selected' : '' }}>NEWS</option>
                    <option value="blog" {{ request('genre')=='blog' ? 'selected' : '' }}>BLOG</option>
                </select>
            </div>
            {{-- サービス --}}
            <div class="filter-group">
                <label for="service">サービス</label>
                <select name="service" id="service">
                    <option value="">ALL</option>
                    <option value="gnstudio" {{ request('service')=='gnstudio' ? 'selected' : '' }}>GN STUDIO</option>
                    <option value="gnmedia" {{ request('service')=='gnmedia' ? 'selected' : '' }}>GN MEDIA</option>
                    <option value="gnacademy" {{ request('service')=='gnacademy' ? 'selected' : '' }}>GN ACADEMY</option>
                </select>
            </div>
            {{-- タグ --}}
            <div class="filter-group">
                <label for="tag">タグ</label>
                <select name="tag" id="tag">
                    <option value="">ALL</option>
                    <option value="pr-video" {{ request('tag')=='pr-video' ? 'selected' : '' }}>PR動画</option>
                    <option value="branding-video" {{ request('tag')=='branding-video' ? 'selected' : '' }}>ブランディング動画</option>
                </select>
            </div>
            <div class="filter-actions">
                <button type="submit" class="filter-button">絞り込み</button>
                <a href="{{ route('front.newsblog.index', ['lang'=>app()->getLocale()]) }}" class="filter-clear">クリア</a>
            </div>
        </form>
    </div>
</section>

{{-- POSTS LIST --}}
<section class="newsblog-posts">
    <div class="container">
        @forelse($posts ?? [] as $post)
            @php $slug = $post->slug ?? null; @endphp
            @if($slug)
                <a href="{{ route('front.news.show', ['lang'=>app()->getLocale(), 'slug'=>$slug]) }}" class="post-link">
            @endif

            <article class="post-item">
                <div class="post-meta">
                    <div class="post-meta-left">
                        <span class="post-genre">{{ strtoupper($post->type ?? '') }}</span>
                        <span class="post-date">{{ $post->created_at?->format('Y-m-d') ?? '' }}</span>
                    </div>
                    <div class="post-meta-right">
                        @if(!empty($post->service))
                            <span class="post-service">{{ strtoupper($post->service) }}</span>
                        @endif
                    </div>
                </div>

                {{-- 画像 --}}
                @if(!empty($post->image_path))
                    <div class="post-image">
                        <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title ?? '' }}">
                    </div>
                @endif

                {{-- タグ --}}
                @if(!empty($post->tags))
                    <p class="post-tags">
                        @foreach(explode(',', $post->tags ?? '') as $tag)
                            <span class="post-tag">{{ trim($tag) }}</span>
                        @endforeach
                    </p>
                @endif

                <h2 class="post-title">{{ $post->title ?? '' }}</h2>
                <p class="post-excerpt">{{ \Illuminate\Support\Str::limit(strip_tags($post->content ?? ''), 150) }}</p>
            </article>

            @if($slug)
                </a>
            @endif
        @empty
            <p class="no-posts">投稿はまだありません。</p>
        @endforelse

        {{-- ページネーション --}}
        <div class="pagination">
            {{ $posts?->links() }}
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
            @foreach(['youtube','instagram','tiktok','facebook','x'] as $icon)
                @if(view()->exists("icons.$icon"))
                    <a href="#" target="_blank" class="follow_icon">@include("icons.$icon")</a>
                @endif
            @endforeach
        </div>
    </div>
</section>

{{-- CTA --}}
<section id="cta" class="cta-section">
    <p class="cta_text">
        気になることや、考えていること、<br>
        何でもお気軽にご相談ください
    </p>
    <a href="{{ route('front.contact.show', ['lang'=>app()->getLocale()]) }}" class="cta_button">お問い合わせはこちら</a>
</section>

@endsection
