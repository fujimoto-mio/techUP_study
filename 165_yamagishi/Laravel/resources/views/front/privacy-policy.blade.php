{{-- resources/views/front/privacy-policy.blade.php --}}
@extends('layouts.app')

@section('title', '個人情報保護方針（プライバシーポリシー）')

@push('head')
    @vite('resources/css/front/privacy-policy.css')
@endpush

@section('content')
<section class="privacy-policy">
    <div class="privacy-policy_inner">

        <h1 class="privacy-policy_title">
            個人情報保護方針（プライバシーポリシー）
        </h1>

        <p>
            GLOBE NATIONは、お客様の個人情報の重要性を認識し、以下の通り個人情報保護方針（プライバシーポリシー）を定め、
            個人情報の適切な保護に努めます。
        </p>

        <p>
            当お問い合わせフォームでは、お客様から以下の個人情報を取得します。
        </p>

        <p>
            取得した個人情報は、以下の目的のために利用します。
        </p>

        <p>
            GLOBE NATIONは、法令に基づく場合を除き、お客様の同意を得ずに
            個人情報を第三者に提供することはありません。
        </p>

        <p>
            GLOBE NATIONは、個人情報の漏洩、紛失、毀損などを防止するため、
            適切な安全管理措置を講じます。
        </p>

        <p>
            個人情報の取り扱いに関するご質問・ご相談は、以下の窓口までお問い合わせください。
        </p>

        <h2 class="privacy-policy_subtitle">
            お問い合わせ窓口情報
        </h2>

        <p>
            本方針は、法令の変更やサービス内容の改善のため、予告なく変更することがあります。
            変更後のプライバシーポリシーは、当ウェブサイトに掲載された時点から効力を生じるものとします。
        </p>

    </div>
</section>
@endsection
