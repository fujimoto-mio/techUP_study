{{-- resources/views/front/solutions/gnstudio.blade.php --}}
@extends('layouts.app')

{{-- OGP・SEO設定 --}}
@section('og_title', 'GLOBE NATION STUDIO｜社会を動かすストーリーを作る映像制作')
@section('og_description', '想いを、伝わる映像に。GN STUDIOは、社会課題の現場に向き合い、本質を捉えた映像制作を行います。特に社会課題・SDGs・CSR領域を得意とする映像制作チームです。')
@section('og_type', 'website')
@section('og_url', url()->current())
@section('og_image', asset('images/default-ogp.png'))

@section('meta_description', '想いを、伝わる映像に。GN STUDIOは、社会課題の現場に向き合い、本質を捉えた映像制作を行います。特に社会課題・SDGs・CSR領域を得意とする映像制作チームです。')
@section('meta_keywords', '社会課題, 社会問題, 映像制作, 動画制作, 映像メディア, メディア, ドキュメンタリー,社会課題 映像, 社会問題 映像, 社会課題 メディア, 社会課題 動画,SDGs, SDGs 映像, SDGs 動画制作, SDGs メディア,CSR, CSR 映像, CSR 動画, CSR コンテンツ制作,サステナビリティ, サステナビリティ 映像, サステナビリティ メディア,ESG, ESG 映像, ESG コンテンツ,NPO, NGO, NPO 映像制作, NGO 映像制作, NPO メディア, NGO メディア,非営利団体, 国際協力, 多文化共生, 教育, 教育 映像, 教育 メディア,ソーシャルビジネス, インパクトビジネス, 社会起業, 共創, コラボレーション,企業連携, 企業 共創, パートナーシップ,ブランデッドコンテンツ, ストーリーテリング, ストーリー 映像,インタビュー映像, 取材映像, 問題提起 映像,映像マーケティング, コンテンツ制作, 動画マーケティング,情報発信, 社会発信, グローバル課題, 国際問題,GLOBE NATION, グローブネーション,GLOBE NATION STUDIO, GN STUDIO, 大阪, 関西, 映像制作会社')

@section('title', 'GLOBE NATION STUDIO｜社会を動かすストーリーを作る映像制作')

@section('body_class', 'page-gnstudio')

@push('head')
    @vite('resources/css/front/solutions/gnstudio.css')
@endpush

@section('header')
@include('layouts.header')
@endsection

@section('content')
{{-- ===============================
    HERO SECTION
================================--}}
<section class="gnstudio-hero">
  <div class="gnstudio-hero_video">
    <div id="yt-gnstudio-player"></div>
  </div>

    <div class="gnstudio-hero_inner">
        <div class="gnstudio-hero_text">
            <p class="gnstudio-hero_title">映像制作・クリエイティブ制作事業</p>
            <h1 class="gnstudio-hero_subtitle font-roboto">GLOBE NATION STUDIO</h1>
        </div>
    </div>

</section>

{{-- ===============================
    MESSAGE SECTION
================================--}}
<section id="gnstudio-message" class="gnstudio-message-section">
    <div class="gnstudio-message-section_inner">
        <h2 class="gnstudio-message-title">"Tell your stories and messages."</h2>
        <p class="gnstudio-message-sub">あなたの物語、想いを届ける</p>
        <div class="gnstudio-message">
            <p>
                私たちGN STUDIOは、映像を“単なる情報を伝える手段”だとは考えていません。<br>
                映像は、人の心を揺らし、<br class="sp">価値観を変え、行動を生み出す——<br>
                そんな“未来を動かすツール”だと信じています。
            </p>
            <p>
                だからこそ、私たちが向き合うのは<br class="sp">「その企業や人が本当に届けたい想い」。<br>
                表面的な魅力ではなく、<br class="sp">そこに至るまでの葛藤や決断、<br>
                たった一人の心の揺れまで、<br class="sp">丁寧にすくい上げます。
            </p>
            <p>
                そして、その物語に宿る“情熱・想い”を<br class="sp">ごまかさずにカメラで捉え、<br>
                あなたのブランドの世界観として再構築する。<br>
                それが、GN STUDIOのクリエイティブです。
            </p>
            <p>
                “Tell your stories and messages.”<br>
                「あなたの物語、想いを届ける。」
            </p>      
            <p>
                それは、あなたのビジネスを動かし、<br class="sp">人の心を動かし、<br>
                社会を少しだけ前へ<br class="sp">進める力になると信じています。
            </p>                                          
        </div>
    </div>
</section>

{{-- ===============================
    CUSTOMER ISSUES
================================--}}
<section class="gnstudio-issues-section">
    <div class="issues-section_inner">
        <div class="section_header gnstudio-issues_header">
            <h2 class="section_title-bg" aria-hidden="true">CUSTOMER ISSUES</h2>
            <h2 class="section_title-en">CUSTOMER ISSUES</h2>
            <p class="section_title-ja">こんなお困りごとはありませんか？</p>
        </div>

        <ul class="gnstudio-customer-issues">

            <!-- 1つ目 -->
            <li>
                <div class="issue-item">
                    <span class="issue-icon-wrapper camera" aria-hidden="true">
                        @include('icons.camera')
                    </span>
                    <p class="issue-text">
                        動画は始めてみたけど<br>
                        質が低く効果が出ない
                    </p>
                </div>
            </li>
            <!-- 2つ目 -->
            <li>
                <div class="issue-item">
                    <span class="issue-icon-wrapper hourglass" aria-hidden="true">
                        @include('icons.hourglass')
                    </span>
                    <p class="issue-text">
                        動画を作る人手や<br>
                        時間が足りない
                    </p>
                </div>
            </li>
            <!-- 3つ目 -->
            <li>
                <div class="issue-item">
                    <span class="issue-icon-wrapper owner" aria-hidden="true">
                        @include('icons.owner')
                    </span>
                    <p class="issue-text">
                        動画は興味はあるけど<br>
                        相談する人がいない
                    </p>
                </div>
            </li>
        </ul>
        <div class="contact-box">
            <h2 class="contact-note">私たちがお力添えいたします！</h2>

            <div class="contact-method">
                <div class=web-contact>
                    <span class="contact-method-icon" aria-hidden="true">
                        @include('icons.notepc')
                    </span>
                    <p class="contact-label">WEBからのお問い合わせはこちら</p>
                    <a href="{{ route('front.contact.show', ['lang' => $lang]) }}" class="btn btn-web">CONTACT</a>
                </div>
                <div class=phone-contact>
                    <span class="contact-method-icon" aria-hidden="true">
                        @include('icons.phone')
                    </span>
                    <p class="contact-label">お電話からのお問い合わせはこちら</p>
                    <a href="tel:+81 70-8379-5788" class="btn btn-phone">+81 70-8379-5788</a>
                </div> 
            </div>
        </div>
    </div>
</section>
{{-- ===============================
    GN STUDIO STRENGTH
================================--}}
<section id="strength" class="strength-section">
    <div class="strength-section_inner">
        <div class="section_header strength_header">
            <h2 class="section_italic_title-en">STRENGTHS</h2>
            <h2 class="section_italic_title-bg" aria-hidden="true">STRENGTHS</h2>
        </div>
        <div class="strength">

            <div class="strength-item">
                <div class="gnstudio-strengths-image">
                    <img src="/images/gnstudio/gnstudio-strengths-01.jpg" alt="「心を揺らす“物語設計力”」">
                </div>                 
                <!--<div class="strength-video gnstudio-works-video">
                    <div class="video-thumbnail" data-video-id="xxxxxx"></div>
                    <div class="video-frame"></div>
                </div>-->

                <div class="strength-text">
                    <h2 class="strength-title">「心を揺らす“物語設計力”」</h2>
                    <h2 class="strength-title-bg">01</h2>
                    <p>
                        私たちは単なる映像制作チームではなく、<br class="sp">“物語をつくる・伝える組織”です。<br>
                        表面的な情報を並べるのではなく、<br class="sp">あなたの事業が生まれた背景、<br>
                        乗り越えてきた葛藤、届けたい未来<br class="sp">——その”心臓部“に触れ、<br>
                        視聴者の感情を揺らすストーリーへと<br class="sp">映像を通して翻訳します。<br>
                        一度きりの視聴で終わらず、<br class="sp">見る人の人生に“余韻”として残る。<br>
                        ビジネス映像でありながら、<br class="sp">人の心に刺さり続ける作品をつくります。
                    </p>
                </div>
            </div>

            <div class="strength-item">
                <div class="gnstudio-strengths-image">
                    <img src="/images/gnstudio/gnstudio-strengths-02.jpg" alt="「リアルな没入映像体験」">
                </div>                 
                <!--<div class="strength-video gnstudio-works-video">
                    <div class="video-thumbnail" data-video-id="xxxxxx"></div>
                    <div class="video-frame"></div>
                </div>-->

                <div class="strength-text">
                    <h2 class="strength-title">「リアルな没入映像体験」</h2>
                    <h2 class="strength-title-bg">02</h2>
                    <p>
                        美しさだけでも、情報だけでも、人は動きません。<br>
                        必要なのは“リアル”<br class="sp">——そこで生きる人の汗や息づかい、<br class="np"><br class="sp">決断の瞬間、目に見えない緊張、温度。<br>
                        GN STUDIOは現場で培った観察眼と、海外で吸収した表現技法を掛け合わせ、<br>
                        “カメラが立ち会っていた事実”<br class="sp">そのもの体験できる映像へと昇華させます。<br>
                        視聴者がただ見るのではなく、<br class="sp">その瞬間に“立ち会う”。<br>
                        そんな没入を生む実写表現を追求しています。
                    </p>
                </div>
            </div>

            <div class="strength-item">
                <div class="gnstudio-strengths-image">
                    <img src="/images/gnstudio/gnstudio-strengths-03.jpg" alt="「少数精鋭だからこそ実現できる“染み込むクオリティ”」">
                </div>                
                <!--<div class="strength-video gnstudio-works-video">
                    <div class="video-thumbnail" data-video-id="xxxxxx"></div>
                    <div class="video-frame"></div>
                </div>-->

                <div class="strength-text">
                    <h2 class="strength-title">「少数精鋭だからこそ実現できる“染み込むクオリティ”」</h2>
                    <h2 class="strength-title-bg">03</h2>
                    <p>
                        大きな制作会社のように、<br class="sp">“誰かに渡して終わり”では<br class="sp">GN STUDIOの制作は終わりません。<br>
                        少数精鋭のチームだからこそ、<br class="sp">あなたの想いと葛藤と情熱を、<br>
                        メンバー全員が真正面から受け取り、<br class="sp">映像の隅々にまで染み込ませることができます。<br>
                        スピーディで柔軟、<br class="sp">そしてクリエイティブがブレない。<br>
                        ひとつひとつの作品に“熱・想い”が宿るのは、<br class="sp">チーム全員が最初から最後まで向き合うから。<br>
                        その真っ直ぐさこそが、<br class="sp">GN STUDIOの品質を生み出しています。
                    </p>
                </div>
            </div>
        </div>

    </div>
</section>
{{-- ===============================
    FLOW
================================--}}
<section id="flow" class="flow-section">
    <div class="flow-section_inner">
        <div class="section_header flow_header">
            <h2 class="section_italic_title-en">CONTRACTING PROCESS</h2>
            <h2 class="section_italic_title-bg" aria-hidden="true">CONTRACTING PROCESS</h2>
        </div>
        <div class="flow">
            <div class="flow-item">
                <h2 class="flow-title">
                    <span class="flow-label">
                        <span class="flow-num">01</span> お問い合わせ
                    </span>
                    <span class="flow-toggle">＋</span>
                </h2>

                <p class="flow-content">
                <span class="indent">
                    本ホームページの
                    <a href="{{ route('front.contact.show', ['lang' => $lang]) }}">お問い合わせフォーム</a>
                    もしくはメール・お電話・SNS上でのDMなどでお問い合わせいただきます。<br>
                    その際に、大まかなイメージやご要望、ご質問等ございましたらお伝えいただけるとその後の流れがスムーズになります。
                </span>
                </p>


            </div>

            <div class="flow-item">
                <h2 class="flow-title">
                    <span class="flow-label">                    
                    <span class="flow-num">02</span> お打ち合わせ
                    </span>                    
                    <span class="flow-toggle">＋</span>
                </h2>
                <p class="flow-content">
                    お問い合わせの際にお伝えいただいた内容をもとに、Zoom等のオンラインツールを活用したオンラインミーティング（もしくはご希望によっては直接お伺いしてのお打ち合わせ）でより詳しくご要望等をお伺いします。<br>
                    動画制作の目的・ターゲット、予算、納期、伝えたいメッセージやストーリー、その他ざっくばらんにお話しさせていただくことでより良いコンテンツを制作できます。
                </p>
            </div>

            <div class="flow-item">
                <h2 class="flow-title">
                    <span class="flow-label">                    
                    <span class="flow-num">03</span> 企画・構成案の作成
                    </span>                    
                    <span class="flow-toggle">＋</span>
                </h2>
                <p class="flow-content">
                    お打ち合わせでお伺いした内容に沿って、ざっくりとした動画の企画・構成案を作成いたします。<br>
                    この段階で、制作の方向性やストーリーなどをある程度決めます。
                </p>
            </div>

            <div class="flow-item">
                <h2 class="flow-title">
                    <span class="flow-label">                    
                    <span class="flow-num">04</span> お見積もり
                    </span>                    
                    <span class="flow-toggle">＋</span>
                </h2>
                <p class="flow-content">
                    作成した企画・構成をもとに、お見積もりを出させていただきます。
                </p>
            </div>

            <div class="flow-item">
                <h2 class="flow-title">
                    <span class="flow-label">                    
                    <span class="flow-num">05</span> ご契約
                    </span>                    
                    <span class="flow-toggle">＋</span>
                </h2>
                <p class="flow-content">
                    企画・構成とお見積もりに関して、必要に応じてお打ち合わせを重ね、双方の同意の上で制作の本契約を結ばせていただきます。
                </p>
            </div>

        </div>

        <div class="section_header flow_header">
            <h2 class="section_italic_title-en">PRODUCTION PROCESS</h2>
            <h2 class="section_italic_title-bg" aria-hidden="true">PRODUCTION PROCESS</h2>
        </div>
        <div class="flow">
            <div class="flow-item">
                <h2 class="flow-title">
                    <span class="flow-label">
                        <span class="flow-num">01</span> キックオフ
                    </span>
                    <span class="flow-toggle">＋</span>
                </h2>

                <p class="flow-content">
                    ご契約締結後に再度、動画の目的やターゲット、具体的なスケジュールをお打ち合わせ（もしくはメッセージのやり取り）を通して決定します。
                </p>
            </div>

            <div class="flow-item">
                <h2 class="flow-title">
                    <span class="flow-label">                    
                    <span class="flow-num">02</span> 企画・構成の詳細化
                    </span>                    
                    <span class="flow-toggle">＋</span>
                </h2>
                <p class="flow-content">
                    ご契約前にご提示した企画・構成案をさらに詳細に作り込みます。<br>
                    ストーリーボード（コンテ）の作成や、詳細な企画書、その他制作を進めるにあたって必要な資料を、必要に応じて作成いたします。<br>
                    この段階でより鮮明に視覚的な要素やメッセージ性・ストーリー性をイメージしていただきやすくなります。
                </p>
            </div>

            <div class="flow-item">
                <h2 class="flow-title">
                    <span class="flow-label">                    
                    <span class="flow-num">03</span> 撮影準備
                    </span>                    
                    <span class="flow-toggle">＋</span>
                </h2>
                <p class="flow-content">
                シナリオ・構成が具体的に決まり次第、撮影準備に入ります。<br>
                撮影準備として、キャスティング・オーディション、ロケハン（撮影場所の下見）、撮影許可取り、衣装決め、機材・小道具準備などを必要に応じてご対応します。
                </p>
            </div>

            <div class="flow-item">
                <h2 class="flow-title">
                    <span class="flow-label">                    
                    <span class="flow-num">04</span> 撮影
                    </span>                    
                    <span class="flow-toggle">＋</span>
                </h2>
                <p class="flow-content">
                    構成をもとに、撮影を行います。<br>
                    撮り直しには費用と時間が追加でかかってしまうため、なるべくスケジュール通りに撮影が遂行できるように、双方の事前準備と撮影内容の理解・共有が大切になります。
                </p>
            </div>

            <div class="flow-item">
                <h2 class="flow-title">
                    <span class="flow-label">                    
                    <span class="flow-num">05</span> 編集
                    </span>                    
                    <span class="flow-toggle">＋</span>
                </h2>
                <p class="flow-content">
                    撮影した素材を、ついに1本のストーリーとして繋げる作業です。
                </p>
            </div>

            <div class="flow-item">
                <h2 class="flow-title">
                    <span class="flow-label">                    
                    <span class="flow-num">06</span> MA（音入れ・ナレーション）
                    </span>                    
                    <span class="flow-toggle">＋</span>
                </h2>
                <p class="flow-content">
                    必要に応じて、MAという最終音入れ・ナレーション録音の作業を行います。<br>
                    これは制作内容によって、編集作業と分けて行う場合と、編集作業に組み込まれる場合があります。
                </p>
            </div>

            <div class="flow-item">
                <h2 class="flow-title">
                    <span class="flow-label">                    
                    <span class="flow-num">07</span> 初稿提出・ご確認
                    </span>                    
                    <span class="flow-toggle">＋</span>
                </h2>
                <p class="flow-content">
                    初稿として出来上がった動画をチェックしていただきます。<br>
                    初稿完成までに必要に応じて、動画素材チェックや編集内容の途中確認など、お打ち合わせを複数回お願いする場合もあります。
                </p>
            </div>

            <div class="flow-item">
                <h2 class="flow-title">
                    <span class="flow-label">                    
                    <span class="flow-num">08</span> 修正・納品
                    </span>                    
                    <span class="flow-toggle">＋</span>
                </h2>
                <p class="flow-content">
                    初稿チェックで修正点がある場合、納期やご予算、契約内容に基づいて修正依頼を承ります。<br>
                    修正まで全て完了した上で、動画を納品いたします。<br>
                    これで晴れて、あなたのメッセージ・ストーリーを世に出す準備が整います！
                </p>
            </div>

            <div class="flow-item">
                <h2 class="flow-title">
                    <span class="flow-label">                    
                    <span class="flow-num">09</span> 制作後サポート
                    </span>                    
                    <span class="flow-toggle">＋</span>
                </h2>
                <p class="flow-content">
                    ご希望に応じて、広告・SNS運用、マーケティング施策など、制作した動画の活用法などについてアドバイスやサポート、コンサルティングも承っております。<br>
                    お気軽にご相談ください！
                </p>
            </div>
        </div>
    </div>
</section>
{{-- ===============================
    GN STUDIO WORKS
================================--}}
<section class="gnstudio-works-section">
    <div class="section_header gnstudio-works_header">
        <h2 class="section_title-bg" aria-hidden="true">WORKS</h2>
        <h2 class="section_title-en">WORKS</h2>
        <p class="section_title-ja">実績</p>
    </div>
    <div>
        <p class="attention">
            制作実績のうち開示可能な一部実績のみを掲載しています。<br>
            その他実績の提示をご希望の場合、<br class="sp">お気軽にお問い合わせフォームもしくはメールにて<br class="sp">お問い合わせください。
        </p>
    </div>
    <ul class="gnstudio-works-list">

        <!-- 1本目 -->
        <li>
            <div class="gnstudio-works-block">
                <div class="gnstudio-works-inner">
                    <div class="gnstudio-works-textarea">
                        <h2 class="gnstudio-works-title">広島県庁主催: 移住政策PR動画</h2>
                        <p class="gnstudio-works-text">
                            広島県主催のHIROBIRO WEEKEND CREATORSという<br>
                            県内23市町の魅力発信PR動画制作プロジェクトに参加。<br>
                            尾道市の移住政策のプロモーション動画制作を担当。
                        </p>
                        <p class="gnstudio-works-small-text">
                            (旧屋号Max’s Video Creationにおいて制作)
                        </p>
                    </div>

                    <div class="gnstudio-works-video">
                        <div class="video-thumbnail" data-video-id="GbA6jUj1d0U"></div>

                        <iframe
                            class="youtube-iframe"
                            src="https://www.youtube.com/embed/GbA6jUj1d0U?controls=1&rel=0"
                            frameborder="0"
                            allow="autoplay; encrypted-media"
                            allowfullscreen
                        ></iframe>
                    </div>
                </div>
            </div>
        </li>

        <!-- 2本目（左右反転構成） -->
        <li>
            <div class="gnstudio-works-block reverse">
                <div class="gnstudio-works-inner">
                    <div class="gnstudio-works-textarea">
                        <h2 class="gnstudio-works-title">株式会社HALTEN JAPAN LIMITED様<br> ブランディングムービー</h2>
                        <p class="gnstudio-works-text">
                            サッカー元日本代表の槙野智章さんがCEOを務める<br>
                            株式会社HALTEN JAPAN LIMITED様の<br>
                            ブランディングムービーの制作を担当。
                        </p>
                        <p class="gnstudio-works-small-text">
                            (旧屋号Max’s Video Creationにおいて制作)
                        </p>
                    </div>
                    <div class="gnstudio-works-video">
                        <div class="video-thumbnail" data-video-id="O3eBZVFSFTo"></div>

                        <iframe
                            class="youtube-iframe"
                            src="https://www.youtube.com/embed/O3eBZVFSFTo?controls=1&rel=0"
                            frameborder="0"
                            allow="autoplay; encrypted-media"
                            allowfullscreen
                        ></iframe>
                    </div>
                </div>
            </div>
        </li>

        <!-- 3本目 -->
        <li>
            <div class="gnstudio-works-block">
                <div class="gnstudio-works-inner">
                    <div class="gnstudio-works-textarea">
                        <h2 class="gnstudio-works-title">Elliot Rhodes London様<br> YouTube動画・PR動画</h2>
                        <p class="gnstudio-works-text">
                            ロンドン発のベルト専門店Elliot Rhodes London様の<br>
                            PR動画およびYouTube動画の制作を担当。<br>
                        </p>
                        <p class="erl-link">
                            公式YouTubeチャンネルはこちら
                            <span class="arrow-pc">➡</span>
                            <span class="arrow-sp">⬇︎</span>
                            <br class="sp">
                            <a href="https://youtube.com/@elliotrhodeslondon8917" target="_blank" rel="noopener">
                                https://youtube.com/@elliotrhodeslondon8917
                            </a>
                        </p>
                    </div>
                    <div class="gnstudio-works-video">
                        <div class="video-thumbnail" data-video-id="v75_HaGctOI"></div>

                        <iframe
                            class="youtube-iframe"
                            src="https://www.youtube.com/embed/v75_HaGctOI?controls=1&rel=0"
                            frameborder="0"
                            allow="autoplay; encrypted-media"
                            allowfullscreen
                        ></iframe>
                    </div>
                </div>
            </div>
        </li>
    </ul>
    <div class="studio-section_link-wrapper">
        <a href="{{ route('front.works.index', ['lang' => $lang]) }}" class="studio-section_link">
            ▶ VIEW MORE
        </a>
    </div>
</section>
{{-- ===============================
    FAQ SECTION
================================--}}
<section id="faq" class="gnstudio-faq-section">
    <div class="gnstudio-faq_inner">

        <div class="section_header gnstudio-faq_header">
            <h2 class="section_title-bg" aria-hidden="true">FAQ</h2>
            <h2 class="section_title-en">FAQ</h2>
            <p class="section_title-ja">よくあるご質問</p>
        </div>

        <ul class="gnstudio-faq-list">

            {{-- 1 --}}
            <li class="faq-item">
                <button class="faq-question">
                    <span class="faq-icon" aria-hidden="true">
                        @include('icons.Q')
                    </span>                    
                        どのような映像制作を依頼できますか？
                    <span class="faq-toggle">＋</span>
                </button>
                <div class="faq-answer-wrapper">
                    <span class="faq-icon faq-icon-a" aria-hidden="true">
                        <span class="faq-icon-letter">
                            @include('icons.A')                            
                        </span>
                    </span>                
                    <p class="faq-answer">
                        GN STUDIOでは、企業・団体・個人を問わず、以下のような映像制作を行っています。<br>
                        •	企業・団体のプロモーション映像<br>
                        •	ブランディング／コンセプトムービー<br>
                        •	ドキュメンタリー・ストーリー映像<br>
                        •	YouTube・SNS向け動画<br>
                        •	採用・インタビュー・イベント記録映像<br><br>

                        単に映像を「つくる」のではなく、背景にある想いや文脈を丁寧に掘り下げ、伝わる形にすることを大切にしています。
                    </p>
                </div>
            </li>

            {{-- 2 --}}
            <li class="faq-item">
                <button class="faq-question">
                    <span class="faq-icon" aria-hidden="true">
                        @include('icons.Q')
                    </span>                    
                        まだ内容が固まっていませんが、<br class="sp">相談しても大丈夫ですか？
                    <span class="faq-toggle">＋</span>
                </button>
                <div class="faq-answer-wrapper">
                        <span class="faq-icon faq-icon-a" aria-hidden="true">
                            <span class="faq-icon-letter">
                                @include('icons.A')                            
                            </span>
                        </span>                 
                    <p class="faq-answer">
                        もちろん可能です。<br>
                        GN STUDIOでは、企画前・構想段階からのご相談を歓迎しています。<br>
                        「何を伝えるべきか」「誰に届けたいのか」といった根本的な部分から、一緒に整理していきます。
                    </p>
                </div>
            </li>

            {{-- 3 --}}
            <li class="faq-item">
                <button class="faq-question">
                    <span class="faq-icon" aria-hidden="true">
                        @include('icons.Q')
                    </span>                    
                        小規模な案件やスモールスタートでも<br class="sp">依頼できますか？
                    <span class="faq-toggle">＋</span>
                </button>
                <div class="faq-answer-wrapper">
                    <span class="faq-icon faq-icon-a" aria-hidden="true">
                        <span class="faq-icon-letter">
                            @include('icons.A')                            
                        </span>
                    </span>                 
                    <p class="faq-answer">
                        はい、可能です。<br>
                        限られたご予算や体制の中でも、目的に対して最適な形を考え、無理のない制作プランをご提案します。
                    </p>
                </div>
            </li>

            {{-- 4 --}}
            <li class="faq-item">
                <button class="faq-question">
                    <span class="faq-icon" aria-hidden="true">
                        @include('icons.Q')
                    </span>                    
                        個人でも依頼できますか？
                    <span class="faq-toggle">＋</span>
                </button>
                <div class="faq-answer-wrapper">
                    <span class="faq-icon faq-icon-a" aria-hidden="true">
                        <span class="faq-icon-letter">
                            @include('icons.A')                            
                        </span>
                    </span>                 
                    <p class="faq-answer">
                        はい。個人、フリーランス、小規模団体からのご依頼にも対応しています。
                    </p>
                </div>
            </li>

            {{-- 5 --}}
            <li class="faq-item">
                <button class="faq-question">
                    <span class="faq-icon" aria-hidden="true">
                        @include('icons.Q')
                    </span>                    
                        映像制作の料金は<br class="sp">いくらくらいかかりますか？
                    <span class="faq-toggle">＋</span>
                </button>
                <div class="faq-answer-wrapper">
                    <span class="faq-icon faq-icon-a" aria-hidden="true">
                        <span class="faq-icon-letter">
                            @include('icons.A')                            
                        </span>
                    </span>                 
                    <p class="faq-answer">
                        制作内容・尺・撮影日数・編集工数などによって異なるため、料金は案件ごとにお見積もりしています。<br>
                        ヒアリング後、ご要望やご予算に応じた最適なプランをご提案します。
                    </p>
                </div>
            </li>
            {{-- 6 --}}
            <li class="faq-item">
                <button class="faq-question">
                    <span class="faq-icon" aria-hidden="true">
                        @include('icons.Q')
                    </span>
                        見積もりや相談は無料ですか？
                    <span class="faq-toggle">＋</span>
                </button>
                <div class="faq-answer-wrapper">
                    <span class="faq-icon faq-icon-a" aria-hidden="true">
                        <span class="faq-icon-letter">
                            @include('icons.A')
                        </span>
                    </span>
                    <p class="faq-answer">
                        はい、初回のご相談・お見積もりは無料です。
                    </p>
                </div>
            </li>

            {{-- 7 --}}
            <li class="faq-item">
                <button class="faq-question">
                    <span class="faq-icon" aria-hidden="true">
                        @include('icons.Q')
                    </span>
                        予算が限られている場合でも<br class="sp">相談できますか？
                    <span class="faq-toggle">＋</span>
                </button>
                <div class="faq-answer-wrapper">
                    <span class="faq-icon faq-icon-a" aria-hidden="true">
                        <span class="faq-icon-letter">
                            @include('icons.A')
                        </span>
                    </span>
                    <p class="faq-answer">
                        可能です。<br>
                        演出や制作工程を工夫することで、ご予算内で最大限の効果を出す方法を一緒に考えます。
                    </p>
                </div>
            </li>

            {{-- 8 --}}
            <li class="faq-item">
                <button class="faq-question">
                    <span class="faq-icon" aria-hidden="true">
                        @include('icons.Q')
                    </span>
                        撮影はどのエリアまで対応していますか？
                    <span class="faq-toggle">＋</span>
                </button>
                <div class="faq-answer-wrapper">
                    <span class="faq-icon faq-icon-a" aria-hidden="true">
                        <span class="faq-icon-letter">
                            @include('icons.A')
                        </span>
                    </span>
                    <p class="faq-answer">
                        主に国内での撮影に対応しています。<br>
                        海外撮影についても、案件内容やご予算によって対応可能な場合がありますので、まずはご相談ください。
                    </p>
                </div>
            </li>

            {{-- 9 --}}
            <li class="faq-item">
                <button class="faq-question">
                    <span class="faq-icon" aria-hidden="true">
                        @include('icons.Q')
                    </span>
                        撮影日数はどのくらい必要ですか？
                    <span class="faq-toggle">＋</span>
                </button>
                <div class="faq-answer-wrapper">
                    <span class="faq-icon faq-icon-a" aria-hidden="true">
                        <span class="faq-icon-letter">
                            @include('icons.A')
                        </span>
                    </span>
                    <p class="faq-answer">
                        内容によって異なりますが、一日〜数日程度が平均的です。<br>
                        ドキュメンタリーなどに関しては取材期間に伴って撮影日数が増減します。<br>
                        事前の企画・準備をしっかり行うことで、撮影日数を抑えることも可能です。
                    </p>
                </div>
            </li>

            {{-- 10 --}}
            <li class="faq-item">
                <button class="faq-question">
                    <span class="faq-icon" aria-hidden="true">
                        @include('icons.Q')
                    </span>
                        修正には対応してもらえますか？
                    <span class="faq-toggle">＋</span>
                </button>
                <div class="faq-answer-wrapper">
                    <span class="faq-icon faq-icon-a" aria-hidden="true">
                        <span class="faq-icon-letter">
                            @include('icons.A')
                        </span>
                    </span>
                    <p class="faq-answer">
                        はい。<br>
                        完成イメージを共有しながら進めることで、ご予算に応じて必要な調整には柔軟に対応しています。<br>
                        大幅な内容変更が生じる場合は、別途ご相談となることがあります。
                    </p>
                </div>
            </li>

            {{-- 11 --}}
            <li class="faq-item">
                <button class="faq-question">
                    <span class="faq-icon" aria-hidden="true">
                        @include('icons.Q')
                    </span>
                        納期はどのくらいですか？
                    <span class="faq-toggle">＋</span>
                </button>
                <div class="faq-answer-wrapper">
                    <span class="faq-icon faq-icon-a" aria-hidden="true">
                        <span class="faq-icon-letter">
                            @include('icons.A')
                        </span>
                    </span>
                    <p class="faq-answer">
                        映像の内容やボリューム、ご希望によりますが、撮影後最短で2〜4週間程度が目安です。<br>
                        しかし、内容によってはさらに時間を要する場合がございますので、お急ぎの場合は事前にご相談ください。
                    </p>
                </div>
            </li>

            {{-- 12 --}}
            <li class="faq-item">
                <button class="faq-question">
                    <span class="faq-icon" aria-hidden="true">
                        @include('icons.Q')
                    </span>
                        納品形式はどのようになりますか？
                    <span class="faq-toggle">＋</span>
                </button>
                <div class="faq-answer-wrapper">
                    <span class="faq-icon faq-icon-a" aria-hidden="true">
                        <span class="faq-icon-letter">
                            @include('icons.A')
                        </span>
                    </span>
                    <p class="faq-answer">
                        基本的には動画データ（MP4等）をオンラインで送付し納品という形になります。<br>
                        YouTube用、SNS用（縦動画・短尺）、WEB CM用など、用途に応じた形式にも対応可能です。<br>
                        お気軽にお申し付けください。
                    </p>
                </div>
            </li>

            {{-- 13 --}}
            <li class="faq-item">
                <button class="faq-question">
                    <span class="faq-icon" aria-hidden="true">
                        @include('icons.Q')
                    </span>
                        映像の著作権はどちらに帰属しますか？
                    <span class="faq-toggle">＋</span>
                </button>
                <div class="faq-answer-wrapper">
                    <span class="faq-icon faq-icon-a" aria-hidden="true">
                        <span class="faq-icon-letter">
                            @include('icons.A')
                        </span>
                    </span>
                    <p class="faq-answer">
                        原則として、映像の使用権をクライアント様に付与する形を取っています。<br>
                        詳細な条件については、契約時に明確にご説明します。
                    </p>
                </div>
            </li>

            {{-- 14 --}}
            <li class="faq-item">
                <button class="faq-question">
                    <span class="faq-icon" aria-hidden="true">
                        @include('icons.Q')
                    </span>
                        制作した映像を実績として<br class="sp">公開されますか？
                    <span class="faq-toggle">＋</span>
                </button>
                <div class="faq-answer-wrapper">
                    <span class="faq-icon faq-icon-a" aria-hidden="true">
                        <span class="faq-icon-letter">
                            @include('icons.A')
                        </span>
                    </span>
                    <p class="faq-answer">
                        実績掲載については、必ず事前にご相談・ご了承をいただいた場合のみ行っています。<br>
                        非公開案件にも対応可能です。
                    </p>
                </div>
            </li>

            {{-- 15 --}}
            <li class="faq-item">
                <button class="faq-question">
                    <span class="faq-icon" aria-hidden="true">
                        @include('icons.Q')
                    </span>
                        他の映像制作会社との違いは何ですか？
                    <span class="faq-toggle">＋</span>
                </button>
                <div class="faq-answer-wrapper">
                    <span class="faq-icon faq-icon-a" aria-hidden="true">
                        <span class="faq-icon-letter">
                            @include('icons.A')
                        </span>
                    </span>
                    <p class="faq-answer">
                        GN STUDIOは、<br>
                        •	表面的な演出ではなく「なぜそれを伝えるのか」を重視<br>
                        •	クライアントと一緒につくる共創型の制作スタイル<br>
                        •	社会性・文化・背景への深い理解<br><br>

                        を強みとしています。
                    </p>
                </div>
            </li>

            {{-- 16 --}}
            <li class="faq-item">
                <button class="faq-question">
                    <span class="faq-icon" aria-hidden="true">
                        @include('icons.Q')
                    </span>
                        社会課題やドキュメンタリー以外の映像も<br class="sp">依頼できますか？
                    <span class="faq-toggle">＋</span>
                </button>
                <div class="faq-answer-wrapper">
                    <span class="faq-icon faq-icon-a" aria-hidden="true">
                        <span class="faq-icon-letter">
                            @include('icons.A')
                        </span>
                    </span>
                    <p class="faq-answer">
                        はい、可能です。<br>
                        GN STUDIOではジャンルを限定せず、そのプロジェクトに本質的な価値があるかを大切にしています。
                    </p>
                </div>
            </li>

            {{-- 17 --}}
            <li class="faq-item">
                <button class="faq-question">
                    <span class="faq-icon" aria-hidden="true">
                        @include('icons.Q')
                    </span>
                        オンラインでの打ち合わせは可能ですか？
                    <span class="faq-toggle">＋</span>
                </button>
                <div class="faq-answer-wrapper">
                    <span class="faq-icon faq-icon-a" aria-hidden="true">
                        <span class="faq-icon-letter">
                            @include('icons.A')
                        </span>
                    </span>
                    <p class="faq-answer">
                        はい。オンラインミーティングにも対応しています。
                    </p>
                </div>
            </li>

            {{-- 18 --}}
            <li class="faq-item">
                <button class="faq-question">
                    <span class="faq-icon" aria-hidden="true">
                        @include('icons.Q')
                    </span>
                        撮影のみ・編集のみの依頼はできますか？
                    <span class="faq-toggle">＋</span>
                </button>
                <div class="faq-answer-wrapper">
                    <span class="faq-icon faq-icon-a" aria-hidden="true">
                        <span class="faq-icon-letter">
                            @include('icons.A')
                        </span>
                    </span>
                    <p class="faq-answer">
                        内容によって対応可能です。<br>
                        ご希望の範囲をお聞かせください。
                    </p>
                </div>
            </li>

            {{-- 19 --}}
            <li class="faq-item">
                <button class="faq-question">
                    <span class="faq-icon" aria-hidden="true">
                        @include('icons.Q')
                    </span>
                        英語字幕や海外向け映像には<br class="sp">対応していますか？
                    <span class="faq-toggle">＋</span>
                </button>
                <div class="faq-answer-wrapper">
                    <span class="faq-icon faq-icon-a" aria-hidden="true">
                        <span class="faq-icon-letter">
                            @include('icons.A')
                        </span>
                    </span>
                    <p class="faq-answer">
                        英語字幕や海外向けの構成についても対応可能です。<br>
                        詳細はプロジェクト内容に応じてご相談ください。
                    </p>
                </div>
            </li>

        </ul>

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
    @vite('resources/js/front/solutions/gnstudio.js')
@endpush
