@extends('admin.layouts.admin')

@push('head')
    @vite([
        'resources/css/admin/posts/create.css',
        'resources/js/admin/posts/create.js',
    ])
@endpush



@section('content')
<div class="container">
    <h1 class="create-title">NEWS & BLOG 新規投稿</h1>

    @if ($errors->any())
        <div class="error-box">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- タイトル -->
        <div class="form-group">
            <label class="form-label">タイトル</label>
            <input type="text" name="title" value="{{ old('title') }}">
        </div>

        <!-- 本文 -->
        <div class="form-group">
            <label class="form-label">本文</label>
            <textarea name="content" id="editor">{{ old('content') }}</textarea>
        </div>

        <!-- 画像 -->
        <div class="form-group">
            <label class="form-label">アイキャッチ画像（任意）</label>
            <input type="file" name="image" accept="image/*">
        </div>

        <!-- 横並びにしたい部分 -->
        <div class="form-row">
            <!-- ジャンル -->
            <div class="form-group">
                <label class="form-label">ジャンル</label>
                <select name="type">
                    <option value="news" {{ old('type')=='news' ? 'selected' : '' }}>NEWS</option>
                    <option value="blog" {{ old('type')=='blog' ? 'selected' : '' }}>BLOG</option>
                </select>
            </div>

            <!-- サービス -->
            <div class="form-group">
                <label class="form-label">サービス</label>
                <select name="service">
                    <option value="">選択なし</option>
                    <option value="gnstudio" {{ old('service')=='gnstudio' ? 'selected' : '' }}>GN STUDIO</option>
                    <option value="gnmedia" {{ old('service')=='gnmedia' ? 'selected' : '' }}>GN MEDIA</option>
                    <option value="gnacademy" {{ old('service')=='gnacademy' ? 'selected' : '' }}>GN ACADEMY</option>
                </select>
            </div>
        </div>

        <!-- タグ -->
        <div class="form-group">
            <label class="form-label">タグ（カンマ区切り）</label>
            <input type="text" name="tags" value="{{ old('tags') }}">
        </div>

        <!-- 公開設定 -->
        <div class="form-group">
            <label>
                <input type="checkbox" name="is_published" value="1" checked>
                公開する
            </label>
        </div>
        <div class="form-actions">
            <button type="submit" class="submit-btn">投稿する</button>
            <a href="{{ route('admin.posts.index') }}">キャンセル</a>
        </div>
    </form>
</div>
@endsection
