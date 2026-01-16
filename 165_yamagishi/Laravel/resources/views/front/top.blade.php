{{-- resources/views/front/top.blade.php --}}

@extends('layouts.app')

{{-- OGP・SEO設定 --}}
@section('og_title', 'GLOBE NATION｜Together, We Shape the GLOBE. 共に描こう、世界のカタチ。')
@section('og_description', 'GLOBE NATIONは、社会課題・SDGs・CSRなどをメインテーマに、企業・NPO・NGOと共創する組織です。映像制作・メディア発信にとどまらず、行動に繋がるプロジェクトを共につくります。')
@section('og_type', 'website')
@section('og_url', url()->current())
@section('og_image', asset('images/OGP_GN_LOGO.png'))

@section('meta_description', 'GLOBE NATIONは、社会課題・SDGs・CSRなどをメインテーマに、企業・NPO・NGOと共創する組織です。映像制作・メディア発信にとどまらず、行動に繋がるプロジェクトを共につくります。')
@section('meta_keywords', '社会課題, 社会問題, 映像制作, 動画制作, 映像メディア, メディア, ドキュメンタリー,社会課題 映像, 社会問題 映像, 社会課題 メディア, 社会課題 動画,SDGs, SDGs 映像, SDGs 動画制作, SDGs メディア,CSR, CSR 映像, CSR 動画, CSR コンテンツ制作,サステナビリティ, サステナビリティ 映像, サステナビリティ メディア,ESG, ESG 映像, ESG コンテンツ,NPO, NGO, NPO 映像制作, NGO 映像制作, NPO メディア, NGO メディア,非営利団体, 国際協力, 多文化共生, 教育, 教育 映像, 教育 メディア,ソーシャルビジネス, インパクトビジネス, 社会起業, 共創, コラボレーション,企業連携, 企業 共創, パートナーシップ,ブランデッドコンテンツ, ストーリーテリング, ストーリー 映像,インタビュー映像, 取材映像, 問題提起 映像,映像マーケティング, コンテンツ制作, 動画マーケティング,情報発信, 社会発信, グローバル課題, 国際問題,GLOBE NATION, グローブネーション, GN MEDIA, GN ACADEMY, GLOBE NATION MEDIA, GLOBE NATION STUDIO, GLOBE NATION ACADEMY')

@section('title', 'GLOBE NATION｜Together, We Shape the GLOBE. 共に描こう、世界のカタチ。')

@push('head')
    @vite('resources/css/front/top.css')
@endpush

{{-- ===== TOPページ専用ナビ ===== --}}
@section('header')
    <header class="global-nav">
        {{-- 左：ロゴ --}}
        <div class="site-header_logo">
            <a href="{{ route('front.home', ['lang' => $lang]) }}" class="site-header_logo-link">
                <img src="{{ asset('images/GN_Logo_Black.svg') }}" alt="GLOBE NATION Logo" width="48">
                <span class="site-header_logo-text font-roboto">GLOBE NATION</span>
            </a>
        </div>

        {{-- 右：メニュー＋言語切替 --}}
        <div class="nav-right">

            {{-- メインメニュー --}}
            <nav class="main-menu js-main-menu">
                <ul class="menu-contents">
                    <li class="menu-item"><a href="{{ route('front.home', ['lang' => $lang]) }}" class="page-link">TOP</a></li>
                    <li class="menu-item"><a href="{{ route('front.about.index', ['lang' => $lang]) }}" class="page-link">ABOUT US</a></li>

                    {{-- ▼ OUR SOLUTIONS（ドロップダウン） --}}
                    <li class="menu-item dropdown">
                        <a href="{{ route('front.home', ['lang' => $lang]) }}#solutions" class="page-link">
                            OUR SOLUTIONS
                            <span class="arrow">▼</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('front.gnmedia', ['lang' => $lang]) }}" class="dropdown-link">GN MEDIA</a></li>
                            <li><a href="{{ route('front.gnstudio', ['lang' => $lang]) }}" class="dropdown-link">GN STUDIO</a></li>
                            <li><a href="{{ route('front.gnacademy', ['lang' => $lang]) }}" class="dropdown-link">GN ACADEMY</a></li>
                        </ul>
                    </li>

                    <li class="menu-item"><a href="{{ route('front.newsblog.index', ['lang' => $lang]) }}" class="page-link">NEWS & BLOG</a></li>
                    <li class="menu-item"><a href="{{ route('front.contact.show', ['lang' => $lang]) }}" class="page-link">CONTACT</a></li>
                </ul>
            </nav>

            {{-- 言語切替 --}}
            <div class="site-header_lang">
                <a href="{{ url('ja') }}" class="{{ $lang === 'ja' ? 'is-active' : '' }}">JP</a> /
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
                <li><a href="{{ route('front.home', ['lang' => $lang]) }}">TOP</a></li>
                <li><a href="{{ route('front.about.index', ['lang' => $lang]) }}">ABOUT US</a></li>
                <li><a href="{{ route('front.home', ['lang' => $lang]) }}#solutions">OUR SOLUTIONS</a></li>
                <li><a href="{{ route('front.gnmedia', ['lang' => $lang]) }}">└ GN MEDIA</a></li>
                <li><a href="{{ route('front.gnstudio', ['lang' => $lang]) }}">└ GN STUDIO</a></li>
                <li><a href="{{ route('front.gnacademy', ['lang' => $lang]) }}">└ GN ACADEMY</a></li>
                </li>
                <li><a href="{{ route('front.newsblog.index', ['lang' => $lang]) }}">NEWS & BLOG</a></li>
                <li><a href="{{ route('front.contact.show', ['lang' => $lang]) }}">CONTACT</a></li>
                <li style="margin-top: 30px;">
                    <a href="{{ url('ja') }}" class="{{ $lang === 'ja' ? 'is-active' : '' }}">JP</a> /
                    <a href="{{ route('coming.soon.en') }}" class="is-disabled">EN</a>
                </li>
            </ul>
        </div>
        <!-- メニューオーバーレイ -->
        <div class="menu-overlay js-menu-overlay"></div>

    </header>
@endsection

{{-- ===== TOPページ専用背景動画 ===== --}}
@section('top-bg-video')
<div class="js-bg-video" id="hero-video-wrap">
    <div id="yt-player"></div>
    <div class="hero-video-overlay"></div>
</div>
@endsection

{{-- ===== コンテンツ ===== --}}
@section('content')
<section id="top" class="top-hero">
    <div class="hero-content">
        <h1 class="hero-content_copy-en">Together, We Shape the GLOBE.</h1>
        <p class="hero-content_copy-ja js-slogan">共に描こう、世界のカタチ。</p>
    </div>
</section>

{{-- ABOUT US --}}
<section id="about" class="about-section">
    <div class="about-section_inner">
        <div class="about-section_column">
                <div class="about-section_left">
                    <p class="about-section_lead">
                        Together, We Shape the GLOBE.<br>
                        共に描こう、世界のカタチ。
                    </p>
                </div>
                <div class="about-section_right-wrapper">
                    <div class="about-section_right">
                        <p>
                            今、世界には無数の課題が潜んでいます。
                        </p>
                        <p>
                            貧困、教育格差、分断、偏見、孤立、環境問題——。<br>
                            ニュースやメディアには大きく取り上げられないけれど、<br>
                            確かに誰かが傷つき、届けたいけど届かない想いが<br>
                            世界のあちこちで積み重なっています。
                        </p>
                        <p>
                            しかし同時に、その痛みの隣には、<br>
                            静かに行動し、声を上げ、解決に挑む人たちもいます。<br>
                            小さなコミュニティーで、社会の現場で、世界で、<br>
                            未来のために一歩を踏み出し続ける人たちが<br>確かに存在しています。
                        </p>
                        <p>
                            GLOBE NATIONが見つめるのは、<br>
                            その“声”と“希望”、そして”想い“です。<br>
                            そして、それらを世界に繋いでいくことが<br class="sp">私たちの使命です。
                        </p>
                        <p>
                            私たちが解決したいのは、<br>
                            「想いが届かないこと」「行動が連鎖しないこと」<br>
                            「気づき・学びが社会に繋がらないこと」。<br>
                            人や企業、コミュニティーが本来持つ力が、<br>
                            届くべき場所・人に届かず、<br>
                            未来の可能性が閉ざされてしまう現状です。
                        </p>
                        <p>
                            だから私たちは、映像で物語を届け（GN STUDIO）、<br>
                            社会の現場の声を可視化し（GN MEDIA）、<br>
                            学びと行動が生まれる土壌をつくり（GN ACADEMY）、<br>
                            世界をより良くする“共創の循環”を創り出します。
                        </p>
                        <p>
                            それは大きな革命ではなく、<br>
                            ひとつの物語、ひとつの気づき、<br class="sp">ひとつの声から始まる変化です。<br>
                            しかし、その小さな変化が連鎖すれば、<br>
                            世界の“カタチ”は<br class="sp">必ず変わっていくと私たちは信じています。
                        </p>
                        <p>
                            GLOBE NATIONと出会うことで、<br>
                            あなたの想いや事業は、<br class="sp">世界のどこかの誰かに確かに届き、<br>
                            誰かの気づき・学びになり、誰かの希望になり、<br>
                            そして“未来を動かす力”へと変わります。
                        </p>
                        <p>
                            ”Together, We Shape the GLOBE.“<br>
                            「共に描こう、世界のカタチ。」
                        </p>    
                        <p>
                            GNにしかできないのは、<br>
                            “社会の声 × 本質の物語 × 学びの循環”を<br class="sp">ひとつに繋ぎ、<br>
                            未来へ続く「共創のエコシステム」をつくること。
                        </p> 
                        <p>
                            この世界を変えるのは、あなたのひとつの行動であり、<br>
                            その行動を広げる物語を紡ぐのが、<br class="sp">GLOBE NATIONです。
                        </p>                                                                                                                                                            
                    </div> 
                </div>      
        </div>
        <div class="about-section_link-wrapper">
            <a href="{{ route('front.about.index', ['lang' => $lang]) }}" class="about-section_link">
                ▶ ABOUT USページへ
            </a>
        </div>
    </div>
</section>


{{-- OUR SOLUTIONS --}}
<section id="solutions" class="solutions-section">
    <div class="section_header solutions_header">
        <h2 class="section_italic_title-bg" aria-hidden="true">OUR SOLUTIONS</h2>
        <h2 class="section_italic_title-en">OUR SOLUTIONS</h2>
        <p class="section_title-ja">GLOBE NATIONができること</p>
    </div>
    <div class="gn-solutions">
        <ul class="contents">
            <li class="gn-media">
                <a href="{{ route('front.gnmedia', ['lang' => $lang]) }}" class="solution-link">
                    <img src="{{ asset('images/GNMEDIA_LOGO_Black.svg') }}" class="gn-solution-logo" alt="GLOBE NATION MEDIA LOGO">
                    <div class="contents_text">
                        <h3 class="font-roboto">GLOBE NATION MEDIA</h3>
                        <p class="solutions-subtitle">メディア・コンテンツ発信事業</p>
                        <p class="copy-en">“One voice can change the world.”</p>
                        <p class="solutions-text">
                            本当に人の心を動かし、行動を起こさせるのは、<br class="sp">必ずしも大きな力だけではなく、<br>
                            誰かの小さな“声”だと私たちは信じています。<br>
                            GN MEDIAは、社会課題や多文化共生の<br class="sp">現場にあるリアルな声を丁寧に可視化し、<br>
                            世界と繋がる物語として発信し、1人でも多くの人に<br>
                            “気づき・学び”を与えるメディアを築いていきます。
                        </p>
                    </div>
                </a>
            </li>
            <li class="gn-studio">
                <a href="{{ route('front.gnstudio', ['lang' => $lang]) }}" class="solution-link">
                    <img src="{{ asset('images/GNSTUDIO_LOGO_Black.svg') }}" class="gn-solution-logo" alt="GLOBE NATION STUDIO LOGO">
                    <div class="contents_text">
                        <h3 class="font-roboto">GLOBE NATION STUDIO</h3>
                        <p class="solutions-subtitle">映像制作・クリエイティブ制作事業</p>
                        <p class="copy-en">“Tell your stories and messages.”</p>
                        <p class="solutions-text">
                            物語・想いは、ただ伝えるだけでは心に届かない。<br>
                            GN STUDIOは、あなたの背景にある<br class="sp">想い・葛藤・未来への願いまでを<br>
                            深く掘り下げ、映像として再構築します。<br>
                            届けたい人にしっかりと伝わる動画を制作します。
                        </p>
                    </div>
                </a>
            </li>
            <li class="gn-academy">
                <a href="{{ route('front.gnacademy', ['lang' => $lang]) }}" class="solution-link">
                    <img src="{{ asset('images/GNACADEMY_LOGO_Black.svg') }}" class="gn-solution-logo" alt="GLOBE NATION ACADEMY LOGO">
                    <div class="contents_text">
                        <h3 class="font-roboto">GLOBE NATION ACADEMY</h3>
                        <p class="solutions-subtitle">教育・コンサルティング事業</p>
                        <p class="copy-en">Coming soon…</p>
                        <p class="solutions-text">
                            GN ACADEMYでは、個人・企業様向けの<br class="sp">教育・コンサルティング事業を通じて<br>
                            社会をより良くする取り組みを行います。
                        </p>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</section>

{{-- NEWS & BLOG --}}
<section id="news&blog" class="newsblog-section">
    <div class="section_header newsblog_header">
        <h2 class="section_title-bg" aria-hidden="true">NEWS & BLOG</h2>
        <h2 class="section_title-en">NEWS & BLOG</h2>
        <p class="section_title-ja">ニュース & ブログ</p>
    </div>
    <div class="newsblog-posts">
        <div class="container">
            @forelse ($latestNews as $item)
                <a href="{{ route('front.news.show', ['lang' => $lang, 'slug' => $item->slug]) }}"
                class="post-link">

                    <article class="post-item">
                        {{-- メタ情報 --}}
                    <div class="post-meta">
                        <div class="post-meta-left">
                            <span class="post-genre">{{ strtoupper($item->type ?? '') }}</span>
                            <span class="post-date">{{ $item->created_at?->format('Y-m-d') ?? '' }}</span>
                        </div>
                        <div class="post-meta-right">
                            @if(!empty($item->service))
                                <span class="post-service">{{ strtoupper($item->service) }}</span>
                            @endif
                        </div>
                    </div>

                        {{-- 画像 --}}
                        <div class="post-image">
                            @if($item->image_path)
                                <img src="{{ asset('storage/' . $item->image_path) }}"
                                    alt="{{ $item->title }}">
                            @else
                                <img src="{{ asset('images/no-image.jpg') }}"
                                    alt="No image">
                            @endif
                        </div>

                        {{-- タイトル --}}
                        <h2 class="post-title">
                            {{ $item->title }}
                        </h2>

                        {{-- 抜粋 --}}
                        <p class="post-excerpt">
                            {{ \Illuminate\Support\Str::limit(strip_tags($item->content), 80) }}
                        </p>

                    </article>
                </a>
            @empty
                <p class="no-posts">投稿はまだありません。</p>
            @endforelse
        </div>
    </div>


    <div class="all-newsblog-section_link-wrapper">
        <a href="{{ route('front.newsblog.index', ['lang' => $lang]) }}" class="all-newsblog-link">
            ▶ ALL NEWS & BLOG
        </a>
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
        気になることやお困りごと等ございましたら、<br>
        お気軽にご質問・ご相談ください！
    </p>
    <a href="{{ route('front.contact.show', ['lang' => $lang]) }}" class="cta_button">お問い合わせはこちら</a>
</section>
@endsection

{{-- ===== ページ専用 JS ===== --}}
@push('scripts')
    <script>window._GLOBE_BG_VIDEO_ID = "qZ_BO9WMSTs";</script>
    @vite('resources/js/front/top.js')
@endpush


