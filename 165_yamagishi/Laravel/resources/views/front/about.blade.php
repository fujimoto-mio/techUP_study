{{-- resources/views/front/about.blade.php --}}
@extends('layouts.app')

{{-- OGP・SEO設定 --}}
@section('og_title', 'ABOUT US｜社会課題に向き合い共創するGLOBE NATION')
@section('og_description', 'GLOBE NATIONは、社会課題の現場に向き合い、映像・メディア・教育を通じて人と組織を繋ぐ共創型組織です。企業・NPO・NGOと協働し、社会に実装される変化を生み出します。')
@section('og_type', 'website')
@section('og_url', url()->current())
@section('og_image', asset('images/default-ogp.png'))

@section('meta_description', 'GLOBE NATIONは、社会課題の現場に向き合い、映像・メディア・教育を通じて人と組織を繋ぐ共創型組織です。企業・NPO・NGOと協働し、社会に実装される変化を生み出します。')
@section('meta_keywords', '社会課題, 社会問題, 映像制作, 動画制作, 映像メディア, メディア, ドキュメンタリー,社会課題 映像, 社会問題 映像, 社会課題 メディア, 社会課題 動画,SDGs, SDGs 映像, SDGs 動画制作, SDGs メディア,CSR, CSR 映像, CSR 動画, CSR コンテンツ制作,サステナビリティ, サステナビリティ 映像, サステナビリティ メディア,ESG, ESG 映像, ESG コンテンツ,NPO, NGO, NPO 映像制作, NGO 映像制作, NPO メディア, NGO メディア,非営利団体, 国際協力, 多文化共生, 教育, 教育 映像, 教育 メディア,ソーシャルビジネス, インパクトビジネス, 社会起業, 共創, コラボレーション,企業連携, 企業 共創, パートナーシップ,ブランデッドコンテンツ, ストーリーテリング, ストーリー 映像,インタビュー映像, 取材映像, 問題提起 映像,映像マーケティング, コンテンツ制作, 動画マーケティング,情報発信, 社会発信, グローバル課題, 国際問題,GLOBE NATION, グローブネーション, GN MEDIA, GN ACADEMY, GLOBE NATION MEDIA, GLOBE NATION STUDIO, GLOBE NATION ACADEMY, 大阪, 関西, 映像制作会社')

@section('title', 'ABOUT US｜社会課題に向き合い共創するGLOBE NATION')

@push('head')
    @vite('resources/css/front/about.css')
@endpush

@section('header')
@include('layouts.header')
@endsection

@section('content')
{{-- ===============================
      HERO SECTION
================================--}}
<section class="about-hero">
    <!-- 背景スライド -->
    <div class="about-hero_bg">
        <span class="bg bg1"></span>
        <span class="bg bg2"></span>
        <span class="bg bg3"></span>
        <span class="bg bg4"></span>
        <span class="bg bg5"></span>
    </div>

    <!-- 既存コンテンツ -->
    <div class="about-hero_inner">
        <h1 class="about-hero_title">ABOUT US</h1>
    </div>
</section>


{{-- ===============================
      MESSAGE SECTION
================================--}}
<section id="message" class="message-section">
    <div class="message-section_inner">
        <div class="section_header message_header">
            <h2 class="section_italic_title-en">MESSAGE</h2>
            <h2 class="section_italic_title-bg" aria-hidden="true">MESSAGE</h2>
        </div>
        <h2 class="message-title">Together, We Shape the GLOBE.</h2>
        <p class="message-sub">共に描こう、世界のカタチ。</p>
        <div class="message">
            <p>
                みなさま、はじめまして。<br>
                GLOBE NATION代表の瀬田と申します。
            </p>
            <p>
                私は和歌山大学在籍時からずっと<br class="sp">GLOBE NATIONの事業構想を練っていました。
            </p>
            <p>
                「自分ができる形でどうにかして<br class="sp">国際協力・社会貢献ができないだろうか？」<br>
                「どうすればより多くの人々が、社会・世界を<br class="sp">より良い方向に変えようと思ってくれるのか？」
            </p>
            <p>
                そんなことを大学生の頃は考えていました。
            </p>
            <p>
                そんな中、<br class="sp">「世界のことをもっと知らないといけない！」<br class="sp">と強く思うようになり、生まれ育った日本を離れ、<br>
                アメリカの大学で国際学を学ぶ決心をし、<br class="sp">2018年に単身渡米しました。
            </p>            
            <p>
                育ってきた環境・文化が違えば、<br class="sp">物事に対する価値観・考え方が変わるということ。<br>
                そんな違いはあれど、「人は人」であり、みんな「この世界で共に生きる仲間」であるということ。<br>
                ただそれでも、<br class="sp">やはりこの社会には問題が常に潜んでいて、<br class="sp">それを解決することで<br class="sp">より良い未来を築けるということ。
            </p>
            <p>
                そして、人と人との繋がり・相互理解、<br class="sp">この地球の未来へ向ける視点の<br class="sp">ベクトルの共有が大切であること。
            </p>
            <p>
                在学中にそんな学びを得ることができました。
            </p>
            <p>
                そしてその学び・気づきを心に刻み込み、<br class="sp">2020年に帰国した後、<br>
                フリーランスでMax’s Video Creationという<br class="sp">屋号のもと映像制作業を始めました。
            </p>
            <p>
                なぜ自分の理想の実現のために<br class="sp">映像制作という道を選んだのか？
            </p>
            <p>
                それは「映像が持つメッセージ性・ストーリー性」が社会を変える大きな力になると<br class="sp">確信したからです。<br>
                魅力的で心に残る映像を作ることで、<br class="sp">1人でも多くの人に想いを届けられる。<br>
                そんな映像を作ることができる知識と技術、<br class="sp">センスを確立したい！<br>
                そんな想いで<br class="sp">今まで映像制作に向き合ってきました。
            </p> 
            <p>
                そしてそれらを培った今、<br class="sp">私は大きな一歩を踏み出しています。<br>
                それの一歩こそが、GLOBE NATIONです。
            </p>
            <p>
                私1人の力では、<br class="sp">社会を大きく変えることは難しいかもしれません。<br>
                私1人では、<br class="sp">救える命・動かせる心・解決できる課題は<br class="sp">少ないかもしれません。
            </p>
            <p>
                しかし、既に社会課題の解決に<br class="sp">取り組んでいらっしゃる企業・団体・個人の<br class="sp">みなさまと手を取り合い、<br>
                協働することで社会により大きなインパクトを残し、変化を与えることができると信じています。
            </p>
            <p>
                その架け橋となり、共に世界のカタチを描いていく<br class="sp">みなさまのパートナーとして活動するのが、GLOBE NATIONです。
            </p>
            <p>
                国連が掲げる2030年のSDGs達成、<br class="sp">そしてそれ以降の世界平和、<br class="sp">より良い社会の実現のため、<br>
                多くの志高いみなさまとの協働を<br class="sp">心待ちにしております。
            </p>
            <p>
                共に世界のカタチを描きましょう！
            </p>
            <p>
                GLOBE NATION<br>
                代表: 瀬田　大史
            </p>                                                                                                                                                           
        </div>
    </div>
</section>

{{-- ===============================
    MISSION / VISION / VALUE
================================--}}
<section class="mvv-section">
    <ul>
        <li>
            <div class="mvv-block">
                <div class="mvv-inner">
                    <div class="mvv-textarea">
                        <h2 class="mvv-title">MISSION</h2>
                        <h2 class="mvv-subtitle">あらゆる垣根を越え、人と人・今と未来を繋ぐ。</h2>
                        <p class="mvv-text">
                            GLOBE NATIONは、人種・国籍・文化・言語などあらゆる垣根を越え、<br>
                            一人ひとりの物語や視点、経験を丁寧に繋ぎ合わせ、<br>
                            互いを理解し合い、共存できる未来のカタチを作ります。<br>
                            私たちは“分断”ではなく“繋がり”を広げ、<br>
                            誰もが尊厳をもって語り、学び、関われる世界を目指します。
                        </p>
                    </div>
                </div>
            </div>
        </li>
        <li>
            <div class="mvv-block">
                <div class="mvv-inner">
                    <div class="mvv-textarea">                
                        <h2 class="mvv-title">VISION</h2>
                        <h2 class="mvv-subtitle">共創で世界と未来のカタチを作る原動力に。</h3>
                        <p class="mvv-text">
                            GLOBE NATIONは国際協力・映像・教育を統合した“共創型インパクト組織”として、<br>
                            社会課題の現場と世界中の人々・企業・コミュニティを繋ぎ、<br>
                            気づき・学びと協働が循環する社会モデルを実装します。<br>
                            その結果、誰もが自ら未来・世界のカタチを描く主体へと変わる環境を創出します。
                        </p>
                    </div>

                </div>
            </div>                    
        </li>
    </ul>
</section>

{{-- ===============================
    overview
================================--}}
<section class="overview-section">
    <div class="overview-wrapper">
        <div class="section_header overview_header">
            <h2 class="section_title-bg" aria-hidden="true">OVERVIEW</h2>
            <h2 class="section_title-en">OVERVIEW</h2>
        </div>
        <!-- BUSINESS NAME -->
        <div class="overview-block">
            <div class="overview-title">BUSINESS NAME</div>
            <div class="overview-content">
            GLOBE NATION
            </div>
        </div>

        <!-- OWNER -->
        <div class="overview-block">
            <div class="overview-title">OWNER</div>
            <div class="overview-content">
                瀬田 大史 / Daishi Seta
            </div>
        </div>

        <!-- FOUNDATION -->
        <div class="overview-block">
            <div class="overview-title">FOUNDATION</div>
            <div class="overview-content">
            2025/10/06
            </div>
        </div>

        <!-- SERVICES -->
        <div class="overview-block">
            <div class="overview-title">SERVICES</div>
            <div class="overview-content services-list">
            <p>・映像制作全般（企画、構成、撮影、ディレクション、編集 etc.）</p>
            <p>・ドキュメンタリー制作</p>
            <p>・SNS運用代行</p>
            <p>・オンライン講座</p>
            <p>・イベントプロデュース</p>
            <p>・各種コンサルティング</p>
            <p>・その他GLOBE NATIONのミッションに沿った事業</p>            
            </div>
        </div>

        <!-- CONTACT -->
        <div class="overview-block contact">
            <div class="overview-title">CONTACT</div>
            <div class="overview-content">
            <p>EMAIL：info@globe-nation.com</p>
            <p>PHONE：+81 70-8379-5788</p>
            <p>所在地：大阪</p>

            <!-- ▼ SNSアイコン -->
            <div class="sns-area">
                <a href="https://www.youtube.com/@GLOBENATIONMEDIA" target="_blank" class="follow_icon">@include('icons.youtube')</a>
                <a href="https://www.instagram.com/globe.nation" target="_blank" class="follow_icon">@include('icons.instagram')</a>
                <a href="https://www.tiktok.com/@globe.nation" target="_blank" class="follow_icon">@include('icons.tiktok')</a>
                <a href="https://www.facebook.com/WeAreGLOBENATION/" target="_blank" class="follow_icon">@include('icons.facebook')</a>
                <a href="https://x.com/globe_nation" target="_blank" class="follow_icon">@include('icons.x')</a>
            </div>
        </div>
    </div>
</section>

{{-- ===============================
      OWNER INTRO
================================--}}
<section class="owner-section">
    <div class="ownermessage-wrapper">
        <!-- OWNER'S MESSAGE -->
        <div class="section_header ownermessage_header">
            <h2 class="section_italic_title-en">OWNER's PROFILE</h2>
            <h2 class="section_italic_title-bg" aria-hidden="true">OWNER's PROFILE</h2>
        </div>

        <div class="owner-profile">
            <!-- 左：写真 -->
            <div class="owner-photo">
                <img src="{{ asset('images/about/owner.jpg') }}" alt="Owner Photo">
            </div>

            <!-- 右：名前・役職・歴史 -->
            <div class="owner-info">
                <div class="owner-header">

                    <!--  名前だけをまとめるラッパ -->
                    <div class="owner-name-block">
                        <div class="name-ja">瀬田 大史</div>
                        <div class="name-en">DAISHI SETA</div>
                    </div>

                    <!-- 役職 -->
                    <span class="job-title">OWNER<br>VIDEO CREATOR</span>
                </div>


                <div class="owner-history">
                    <p>大阪出身。<br>
                        和歌山大学経済学部に入学後、<br>米国インディアナ州にある四年制私立大学Hanover College(国際学専攻)へ編入。<br>
                        アメリカの大学在学中に、映像が持つ「メッセージ性」に魅了される。
                    </p>
                    <p>
                        2020年に同大学卒業後、コロナ真っ只中で帰国し、フリーランスの映像クリエイターとして<br>
                        Max's Video Creationという屋号のもと、フルパッケージの映像制作事業を開始。
                    </p>
                    <p>
                        現在に至るまで、語学力と国際理解力を活用し、<br>
                        国内外向けの企業PR動画やYouTubeドキュメンタリー映像などをメインに制作。<br>
                        制作に携わったYouTube動画の総再生回数は約9000万回再生。
                    </p>
                    <p>
                        2025年10月6日「国際協力の日」にGLOBE NATIONを設立。
                    </p>
                </div>
            </div>
        </div>

        <!-- BOTTOM LINE -->
        <div class="bottom-line"></div>

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
    @vite('resources/js/front/about.js')
@endpush
