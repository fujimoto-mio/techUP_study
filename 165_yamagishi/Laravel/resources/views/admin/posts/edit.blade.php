@extends('admin.layouts.admin')

@push('head')
    @vite([
        'resources/css/admin/posts/create.css',
        'resources/js/admin/posts/create.js',
    ])
@endpush


@section('content')
<div class="container">
    <h1 class="create-title">NEWS & BLOG 投稿編集</h1>

    @if ($errors->any())
        <div class="error-box">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.posts.update', $post) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- タイトル -->
        <div class="form-group">
            <label class="form-label">タイトル</label>
            <input type="text" name="title" value="{{ old('title', $post->title) }}">
        </div>

        <!-- 本文 -->
        <div class="form-group">
            <label class="form-label">アイキャッチ画像（任意）</label>
            <textarea name="content" id="editor">{{ old('content', $post->content) }}</textarea>
        </div>

        <!-- 画像 -->
        <div class="form-group">
            <label class="form-label">画像アップロード</label>
            @if($post->image_path)
                <div class="image-preview">
                    <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }}">
                </div>
            @endif
            <input type="file" name="image" accept="image/*">
        </div>

        <!-- 横並びにしたい部分 -->
        <div class="form-row">
            <!-- ジャンル -->
            <div class="form-group">
                <label class="form-label">ジャンル</label>
                <select name="type">
                    <option value="news" {{ old('type', $post->type)=='news' ? 'selected' : '' }}>NEWS</option>
                    <option value="blog" {{ old('type', $post->type)=='blog' ? 'selected' : '' }}>BLOG</option>
                </select>
            </div>

            <!-- サービス -->
            <div class="form-group">
                <label class="form-label">サービス</label>
                <select name="service">
                    <option value="">選択なし</option>
                    <option value="gnstudio" {{ old('service', $post->service)=='gnstudio' ? 'selected' : '' }}>GN STUDIO</option>
                    <option value="gnmedia" {{ old('service', $post->service)=='gnmedia' ? 'selected' : '' }}>GN MEDIA</option>
                    <option value="gnacademy" {{ old('service', $post->service)=='gnacademy' ? 'selected' : '' }}>GN ACADEMY</option>
                </select>
            </div>
        </div>

        <!-- タグ -->
        <div class="form-group">
            <label class="form-label">タグ（カンマ区切り）</label>
            <input type="text" name="tags" value="{{ old('tags', $post->tags) }}">
        </div>

        <!-- 公開設定 -->
        <div class="form-group">
            <label>
                <input type="checkbox" name="is_published" value="1" {{ old('is_published', $post->is_published) ? 'checked' : '' }}>
                公開する
            </label>
        </div>

        <div class="form-actions">
            <button type="submit" class="submit-btn">更新する</button>
            <a href="{{ route('admin.posts.index') }}">キャンセル</a>
        </div>
    </form>
</div>
@endsection
