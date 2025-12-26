@extends('layouts.app')

{{-- OGP・SEO設定 --}}
@section('og_title', 'お問い合わせフォーム | GLOBE NATION')
@section('og_description', 'GLOBE NATIONへの各種お問い合わせはこちら')
@section('og_type', 'website')
@section('og_url', url()->current())
@section('og_image', asset('images/default-ogp.png'))

@section('meta_description', 'GLOBE NATIONへの各種お問い合わせはこちら')
@section('meta_keywords', 'グローバル,国際,ニュース,社会課題')

@section('title', 'お問い合わせフォーム | GLOBE NATION')

@section('title', 'CONTACT')

@push('head')
    @vite('resources/css/front/contact/show.css')
@endpush

@section('content')
<div class="contact-container">

    {{-- 見出し --}}
    <section class="contact-title">
        <h2>CONTACT</h2>
        <p>
            制作に関するご相談やお問い合わせは、<br class="sp">
            必要事項を入力の上、お問い合わせください。<br>
            2～3日以内に、担当よりメールにて返信致します。<br>
            必須項目は必ず入力して頂きますようお願い申し上げます。
        </p>
    </section>

    {{-- フォーム --}}
    <form method="POST" action="{{ route('front.contact.send', ['lang' => $lang]) }}" class="contact-form">
        @csrf

        {{-- エラーメッセージ --}}
        @if ($errors->any())
            <ul class="form-errors">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {{-- カテゴリ --}}
        <div class="form-group">
            <label>Select Category <span class="required">必須</span></label>
            <select name="category" required>
                <option value="">▼ 選択してください</option>
                <option value="media" @selected(old('category') === 'media')>GN MEDIAの取材・制作について</option>
                <option value="studio" @selected(old('category') === 'studio')>GN STUDIOの映像制作・制作コンサルについて</option>
                <option value="partnership" @selected(old('category') === 'partnership')>協業・協賛について</option>
                <option value="recruit" @selected(old('category') === 'recruit')>採用について</option>
                <option value="other" @selected(old('category') === 'other')>その他ご相談・ご質問等</option>

            </select>
        </div>

        {{-- 会社名 --}}
        <div class="form-group">
            <label>Company / Organization Name（任意）</label>
            <input type="text" name="company" placeholder="GLOBE NATION" value="{{ old('company') }}">
        </div>

        {{-- 名前 --}}
        <div class="form-group">
            <label>Name <span class="required">必須</span></label>
            <input type="text" name="name" placeholder="Enter Your Name" value="{{ old('name') }}" required>
        </div>

        {{-- メール --}}
        <div class="form-group">
            <label>Email <span class="required">必須</span></label>
            <input type="email" name="email" placeholder="Email Address" value="{{ old('email') }}" required>
        </div>

        {{-- 電話番号 --}}
        <div class="form-group">
            <label>Phone <span class="required">必須</span></label>
            <input type="tel" name="phone" placeholder="000-0000-0000" value="{{ old('phone') }}" required>
        </div>

        {{-- メッセージ --}}
        <div class="form-group">
            <label>Your Message <span class="required">必須</span></label>
            <textarea name="message" rows="6" placeholder="本文" class="no-resize" required>{{ old('message') }}</textarea>
        </div>

        {{-- 同意 --}}
        <label class="form-check">
            <input
                type="checkbox"
                name="agreement"
                class="styled-checkbox"
                @checked(old('agreement'))
                required
            >

            <span>
                <a href="{{ route('front.privacy.policy', ['lang' => $lang ?? 'ja']) }}" target="_blank">
                    個人情報保護方針
                </a>
                について同意します
                <span class="required">必須</span>
            </span>
        </label>

        {{-- 送信 --}}
        <div class="form-submit">
            <button type="submit">送信する</button>
        </div>
    </form>

</div>
@endsection
