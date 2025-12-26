{{-- resources/views/front/solutions/gnmedia.blade.php --}}
@extends('layouts.app')

{{-- OGP・SEO設定 --}}
@section('og_title', 'GLOBE NATION MEDIA｜社会課題に向き合うドキュメンタリーメディア')
@section('og_description', 'ひとりの声から社会を変える。GN MEDIAは、社会課題の現場に入り、映像を通じて世界と繋がるドキュメンタリーメディアです。')
@section('og_type', 'website')
@section('og_url', url()->current())
@section('og_image', asset('images/default-ogp.png'))

@section('meta_description', 'ひとりの声から社会を変える。GN MEDIAは、社会課題の現場に入り、映像を通じて世界と繋がるドキュメンタリーメディアです。')
@section('meta_keywords', '社会課題, 社会問題, 映像制作, 動画制作, 映像メディア, メディア, ドキュメンタリー,社会課題 映像, 社会問題 映像, 社会課題 メディア, 社会課題 動画,SDGs, SDGs 映像, SDGs 動画制作, SDGs メディア,CSR, CSR 映像, CSR 動画, CSR コンテンツ制作,サステナビリティ, サステナビリティ 映像, サステナビリティ メディア,ESG, ESG 映像, ESG コンテンツ,NPO, NGO, NPO 映像制作, NGO 映像制作, NPO メディア, NGO メディア,非営利団体, 国際協力, 多文化共生, 教育, 教育 映像, 教育 メディア,ソーシャルビジネス, インパクトビジネス, 社会起業, 共創, コラボレーション,企業連携, 企業 共創, パートナーシップ, ストーリーテリング, ストーリー 映像,インタビュー映像, 取材映像, 問題提起 映像, コンテンツ制作,情報発信, 社会発信, グローバル課題, 国際問題,GLOBE NATION, グローブネーション, GN MEDIA, GLOBE NATION MEDIA')

@section('title', 'GLOBE NATION MEDIA｜社会課題に向き合うドキュメンタリーメディア')

@section('body_class', 'page-gnmedia')

@push('head')
    @vite('resources/css/front/solutions/gnmedia.css')
@endpush

@section('header')
@include('layouts.header')
@endsection

@section('content')
{{-- ===============================
    HERO SECTION
================================--}}
<section class="gnmedia-hero">
  <div class="gnmedia-hero_video">
    <div id="yt-gnmedia-player"></div>
  </div>    
    <div class="gnmedia-hero_inner">
        <p class="gnmedia-hero_title">メディア・コンテンツ発信事業</p>
        <h1 class="gnmedia-hero_subtitle">GLOBE NATION MEDIA</h1>
    </div>
</section>

{{-- ===============================
    MESSAGE SECTION
================================--}}
<section id="gnmedia-message" class="gnmedia-message-section">
    <div class="gnmedia-message-section_inner">
        <h2 class="gnmedia-message-title">"One voice can change the world."</h2>
        <p class="gnmedia-message-sub">ひとつの声が世界を変える。</p>
        <div class="gnmedia-message">
            <p>
                社会は、いつも“大きな力”によって<br class="sp">変わるわけではありません。<br>
                ひとりの行動、ひとつの想い、<br class="sp">たった一言の勇気が、人の心を揺らし、<br>
                コミュニティを動かし、<br class="sp">世界を少しずつ変えていきます。
            </p>
            <p>
                GN MEDIAが向き合うのは、その“声”です。<br>
                社会課題の現場で生きる人たちの、小さく、<br class="sp">しかしそれでいて確かな想い。<br>
                コミュニティーの中で静かに積み重ねられている努力。<br>
                世界のどこかで始まった、小さな希望の兆し。
            </p>
            <p>
                私たちは、その声を拾い上げ、丁寧に可視化し、<br>
                誰かの「知らなかった」を<br class="sp">「知れてよかった」に変える。<br>
                1人でも多くの人に“気づき・学び”を提供する。<br>
                そしてその積み重ねが、<br class="sp">やがて社会を前へ進めていくと信じています。
            </p>
            <p>
                “One voice can change the world.”<br>
                「ひとつの声が世界を変える。」
            </p>
            <p>
                あなたの声も、誰かの声も、<br class="sp">世界のどこかに届き、未来を動かす力になる。
            </p>
            <p>
                GN MEDIAは、その“きっかけ”をつくるメディアです。
            </p>                                  
        </div>
    </div>
</section>

{{-- ===============================
    GN MEDIA WORKS
================================--}}
<section class="gnmedia-works-section">
    <div class="section_header gnmedia-works_header">
        <h2 class="section_title-bg" aria-hidden="true">WORKS</h2>
        <h2 class="section_title-en">WORKS</h2>
    </div>

    <ul class="gnmedia-works-list">
        <!-- 1本目 -->
        <li>
            <div class="gnmedia-works-block">
                <div class="gnmedia-works-inner">

                    <div class="gnmedia-works-textarea">
                        <h2 class="gnmedia-works-title">社会課題・地域課題のドキュメンタリー発信</h2>
                        <h2 class="gnmedia-works-subtitle">——現場にある“声”を、社会に届ける。</h2>
                        <p class="gnmedia-works-text">
                            GN MEDIAは、社会課題の“現場”に立ちます。<br>
                            貧困、教育、多文化共生、格差、分断——<br>
                            数字やデータだけでは見えてこない、<br class="sp">当事者や実践者の「声」を丁寧に取材し、<br>
                            ドキュメンタリーとして発信します。
                        </p>
                        <p class="gnmedia-works-text">
                            課題を煽るのではなく、理解を深め、行動のきっかけを生む。<br>
                            社会と人を繋ぐためのメディアです。
                        </p>

                        <div class="gnmedia-works-examples">
                            <p class="gnmedia-works-examples-title">主なコンテンツ例</p>
                            <ul class="gnmedia-works-examples-list">
                                <li>社会課題に取り組む個人・団体・企業のドキュメンタリー映像</li>
                                <li>地域・教育・福祉・多文化共生の現場取材</li>
                                <li>日本の社会課題を海外視点で再構築する映像コンテンツ</li>
                            </ul>
                        </div> 
                    </div>
                    <div class="gnmedia-works-image js-zoom-fade">
                        <img src="/images/gnmedia/gnmedia-works-01.jpg" alt="社会課題・地域課題のドキュメンタリー">
                    </div>
                    
                   <!-- <div class="gnmedia-works-video">
                        <div class="video-thumbnail" data-video-id="動画ID1"></div>
                        <div class="video-frame"></div>
                    </div>-->
                </div>
            </div>
        </li>

        <!-- 2本目（左右反転構成） -->
        <li>
            <div class="gnmedia-works-block">
                <div class="gnmedia-works-inner">

                    <div class="gnmedia-works-textarea">
                        <h2 class="gnmedia-works-title">人物・団体にフォーカスした<br class="sp">ストーリーコンテンツ制作</h2>
                        <h2 class="gnmedia-works-subtitle">——ひとりの行動が、世界を動かし始める。</h2>
                        <p class="gnmedia-works-text">
                            世界を変えるのは、必ずしも大きな組織だけではありません。<br>
                            GN MEDIAは、社会の中で行動し続ける<br class="sp">個人や団体の物語に焦点を当て、<br>
                            その背景・葛藤・想いを丁寧に描きます。
                        </p>
                        <p class="gnmedia-works-text">
                            単なる紹介ではなく、<br>
                            「なぜ続けているのか」「何と向き合っているのか」まで<br class="sp">掘り下げることで、<br>
                            見る人の心に残るストーリーを届けます。
                        </p>

                        <div class="gnmedia-works-examples">
                            <p class="gnmedia-works-examples-title">主なコンテンツ例</p>
                            <ul class="gnmedia-works-examples-list">
                                <li>社会起業家・教育者・活動家・クリエイターへの密着取材</li>
                                <li>NPO・NGO・ソーシャルビジネスの活動紹介</li>
                                <li>企業・団体の社会的取り組みを物語として伝える映像</li>
                            </ul>
                        </div> 
                    </div>
                    <div class="gnmedia-works-image js-zoom-fade">
                        <img src="/images/gnmedia/gnmedia-works-02.jpg" alt="人物・団体にフォーカスしたストーリーコンテンツ制作">
                    </div>                    
                    <!--<div class="gnmedia-works-video">
                        <div class="video-thumbnail" data-video-id="動画ID2"></div>
                        <div class="video-frame"></div>
                    </div>-->
                </div>
            </div>
        </li>

        <!-- 3本目 -->
        <li>
            <div class="gnmedia-works-block">
                <div class="gnmedia-works-inner">

                    <div class="gnmedia-works-textarea">
                        <h2 class="gnmedia-works-title">社会・国際テーマを<br class="sp">学べる解説・教育コンテンツ</h2>
                        <h2 class="gnmedia-works-subtitle">——知ることが、次の一歩になる。</h2>
                        <p class="gnmedia-works-text">
                            GN MEDIAは「伝える」だけで終わりません。<br>
                            物語を入り口に、社会や世界の構造を<br class="sp">理解できる“気づき・学び”へと繋げます。
                        </p>
                        <p class="gnmedia-works-text">
                            難解になりがちな社会問題や国際課題を、<br>
                            誰にでも分かる文脈で整理し、考えるきっかけを提供します。<br>
                            GN ACADEMYと連動し、<br class="sp">学びと行動が循環するコンテンツを展開します。
                        </p>
                        <div class="gnmedia-works-examples">
                            <p class="gnmedia-works-examples-title">主なコンテンツ例</p>
                            <ul class="gnmedia-works-examples-list">
                                <li>社会課題・国際問題を分かりやすく解説する動画・記事</li>
                                <li>日本と海外を比較するカルチャー・教育コンテンツ</li>
                                <li>英語字幕・多言語対応によるグローバル発信</li>
                            </ul>
                        </div> 
                    </div>
                    <div class="gnmedia-works-image js-zoom-fade">
                        <img src="/images/gnmedia/gnmedia-works-03.jpg" alt="社会・国際テーマを学べる教育コンテンツ">
                    </div>                    
                    <!--<div class="gnmedia-works-video">
                        <div class="video-thumbnail" data-video-id="動画ID3"></div>
                        <div class="video-frame"></div>
                    </div>-->
                </div>
            </div>
        </li>
    </ul>
</section>

{{-- ===============================
GN MEDIA COLLABORATION SECTION
================================ --}}
<section class="gnmedia-collaboration-section">
    <div class="gnmedia-collaboration_inner">

        <h2 class="gnmedia-collaboration-title">
            GN MEDIAと協働するという選択
        </h2>

        <div class="gnmedia-collaboration-text">
            <p class="gnmedia-collaboration-lead">
                なぜ、GN MEDIAと協働するのか。
            </p>

            <p>
                GN MEDIAは、単なるメディア露出や<br class="sp">PRだけを目的とした発信は行いません。<br>
                私たちが目指しているのは、<br class="sp">社会課題に向き合う人や組織の“想い”を、<br>
                物語として可視化し、<br class="sp">共感と行動の連鎖を生み出すことです。
            </p>

            <p>
                社会の現場には、まだ知られていない取り組みや、<br>
                声にならない努力が数多く存在します。<br>
                GN MEDIAはそれらに寄り添い、丁寧に取材し、<br>
                短期的な話題づくりではなく、<br class="sp">長く価値が残る発信として届けます。
            </p>

            <p>
                企業・団体・個人の立場を超えて、<br>
                「伝える」から「共につくる」へ。<br>
                GN MEDIAとの協働は、あなたの取り組みを<br>
                社会と世界に繋ぐ“共創の一歩”です。
            </p>
            <a href="{{ route('front.contact.show', ['lang' => $lang]) }}" class="gnmedia-collaboration-btn">
                取材・制作・協賛のご相談はこちら
            </a>            
        </div>

        <div class="gnmedia-collaboration-text">
            <p class="gnmedia-collaboration-lead">
                あなたの取り組みを、社会に届けませんか。
            </p>

            <p>
                社会の現場で続けてきた活動、<br>
                企業や団体として向き合ってきた課題、<br>
                まだ言葉になっていない想いやストーリー。
            </p>

            <p>
                GN MEDIAは、それらを丁寧に受け取り、<br>
                物語として、映像を通じて未来へ繋げていきます。
            </p>

            <p>
                取材のご相談、コンテンツ制作、<br class="sp">協賛・パートナーシップなど、<br>
                まずはお気軽にご相談ください。<br>
                ひとつの声から始まる変化を、共につくりましょう。
            </p>
        </div>

        <a href="{{ route('front.contact.show', ['lang' => $lang]) }}" class="gnmedia-collaboration-btn">
            お問い合わせはこちら
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
        気になることや、考えていること、<br>
        何でもお気軽にご相談ください
    </p>
    <a href="{{ route('front.contact.show', ['lang' => $lang]) }}" class="cta_button">お問い合わせはこちら</a>
</section>

@endsection

{{-- ===== ページ専用 JS ===== --}}
@push('scripts')
    @vite('resources/js/front/solutions/gnmedia.js')
@endpush
