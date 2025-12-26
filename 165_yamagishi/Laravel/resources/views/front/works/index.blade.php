@extends('layouts.app')

{{-- OGP・SEO設定 --}}
@section('og_title', 'WORKS | 映像制作実績')
@section('og_description', 'GLOBE NATIONで制作した映像の実績一覧')
@section('og_type', 'website')
@section('og_url', url()->current())
@section('og_image', asset('images/default-ogp.png'))

@section('meta_description', 'GLOBE NATIONで制作した映像の実績一覧')
@section('meta_keywords', '社会課題, 社会問題, 映像制作, 動画制作, 映像メディア, メディア, ドキュメンタリー,社会課題 映像, 社会問題 映像, 社会課題 メディア, 社会課題 動画,SDGs, SDGs 映像, SDGs 動画制作, SDGs メディア,CSR, CSR 映像, CSR 動画, CSR コンテンツ制作,サステナビリティ, サステナビリティ 映像, サステナビリティ メディア,ESG, ESG 映像, ESG コンテンツ,NPO, NGO, NPO 映像制作, NGO 映像制作, NPO メディア, NGO メディア,非営利団体, 国際協力, 多文化共生, 教育, 教育 映像, 教育 メディア,ソーシャルビジネス, インパクトビジネス, 社会起業, 共創, コラボレーション,企業連携, 企業 共創, パートナーシップ,ブランデッドコンテンツ, ストーリーテリング, ストーリー 映像,インタビュー映像, 取材映像, 問題提起 映像,映像マーケティング, コンテンツ制作, 動画マーケティング,情報発信, 社会発信, グローバル課題, 国際問題,GLOBE NATION, グローブネーション, GN MEDIA, GN ACADEMY, GLOBE NATION MEDIA, GLOBE NATION STUDIO, GLOBE NATION ACADEMY, 大阪, 関西, 映像制作会社, 実績, WORKS, 制作実績')

@section('title', 'WORKS | 映像制作実績')

@push('head')
    @vite('resources/css/front/works/works.css')
@endpush

@section('content')
<section class="works-hero">
    <div class="works-hero_inner">
        <p class="works-hero_title">制作実績</p>        
        <h1 class="works-hero_subtitle">WORKS</p>
    </div>
</section>
{{-- ===============================
    FILTER / TAG SECTION
================================--}}
<section class="works-filter">
    <div class="container">
        {{-- 絞り込みフォーム（ジャンル・サービス・タグなど） --}}
        <form action="{{ route('front.works.index', ['lang'=>app()->getLocale()]) }}" method="GET" class="filter-form-card">

            {{-- 例：カテゴリー --}}
            <div class="filter-group">
                <label>カテゴリー</label>            
                <select name="type">
                    <option value="">ALL</option>
                    <option value="pr" {{ request('type')=='pr' ? 'selected' : '' }}>PR</option>
                    <option value="branding" {{ request('type')=='branding' ? 'selected' : '' }}>BRANDING</option>
                </select>
            </div>


            {{-- 例：サービス --}}
            <div class="filter-group">
                <label for="genre">サービス</label> 
                <select name="service">
                    <option value="">ALL</option>
                    <option value="gnstudio" {{ request('service')=='gnstudio' ? 'selected' : '' }}>GN STUDIO</option>
                    <option value="gnmedia" {{ request('service')=='gnmedia' ? 'selected' : '' }}>GN MEDIA</option>
                    <option value="gnacademy" {{ request('service')=='gnacademy' ? 'selected' : '' }}>GN ACADEMY</option>
                </select>
            </div>

            <div class="filter-actions">
                <button type="submit" class="filter-button">絞り込み</button>

                <!-- クリアボタン：常に表示 -->
                <a href="{{ route('front.works.index', ['lang' => app()->getLocale()]) }}" class="filter-clear">クリア</a>
            </div>

        </form>
    </div>
</section>
{{-- ===============================
   WORKS LIST
================================--}}
<section class="works-posts">
    <div class="container">
        @forelse($works as $work)
            @if($work->slug)
            <a href="{{ route('front.works.show', ['lang' => app()->getLocale(), 'slug' => $work->slug]) }}" class="work-link">
            @endif        
            <article class="work-item">

                <div class="work-meta">
                    <div class="work-meta-left">
                        <span class="work-category">{{ strtoupper($work->type) }}</span>
                        <span class="work-date">{{ $work->created_at->format('Y-m-d') }}</span>
                    </div>
                    <div class="work-meta-right">
                        @if($work->service)                    
                            <span class="work-service">{{ strtoupper($work->service) }}</span>
                        @endif
                    </div>                        
                </div>

                <!-- YouTube動画埋め込み -->
                @if($work->youtube_url)
                    @php
                        $youtube_id = null;

                        // youtu.be/xxxx
                        if (preg_match('~youtu\.be/([^\?]+)~', $work->youtube_url, $matches)) {
                            $youtube_id = $matches[1];
                        }
                        // youtube.com/watch?v=xxxx
                        elseif (preg_match('~v=([^\&]+)~', $work->youtube_url, $matches)) {
                            $youtube_id = $matches[1];
                        }
                        // youtube.com/embed/xxxx
                        elseif (preg_match('~/embed/([^\?]+)~', $work->youtube_url, $matches)) {
                            $youtube_id = $matches[1];
                        }
                    @endphp

                    @if($youtube_id)
                        <div class="work-video">
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


                <!-- タグ -->
                @if($work->tags)
                    <p class="work-tags">
                        @foreach(explode(',', $work->tags) as $tag)
                            <span class="work-tag">{{ trim($tag) }}</span>
                        @endforeach
                    </p>
                @endif

                <!-- タイトル -->                
                <h2 class="work-title">
                        {{ $work->title }}
                </h2>

                <!-- 本文プレビュー -->
                <p class="work-excerpt">
                    {{ \Illuminate\Support\Str::limit(strip_tags($work->content), 150) }}
                </p>

            </article>
            @if($work->slug)
            </a>
            @endif            
        @empty
            <p class="no-works">投稿はまだありません。</p>
        @endforelse

        <div class="pagination">
            {{ $works->links() }}
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

@push('scripts')
    @vite('resources/js/front/works/works.js')
@endpush