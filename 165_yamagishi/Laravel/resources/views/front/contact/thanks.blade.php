@extends('layouts.app')

@section('title', 'お問い合わせ完了')

@push('head')
    @vite('resources/css/front/contact/thanks.css')
@endpush

@section('content')
<div class="contact-thanks">
    <h2>
        お問い合わせありがとうございます。
    </h2>
    <p>
        ※内容は正常に送信されました。<br>
        自動返信メールをお送りしていますのでご確認ください。
    </p>    
    <p>
        お問い合わせ内容をご確認でき次第<br class="sp">ご連絡いたしますので、今しばらくお待ちください。
    </p>
    <a href="{{ route('front.home', ['lang' => $lang ?? 'ja']) }}" class="back-home">トップページに戻る</a>
</div>
@endsection
