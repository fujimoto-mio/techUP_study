@extends('admin.layouts.admin')

@push('head')
    @vite('resources/css/admin/works/create.css')
@endpush

@section('content')
<div class="container">
    <h1 class="create-title">WORKS 投稿編集</h1>

    @if ($errors->any())
        <div class="error-box">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.works.update', $work) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- タイトル -->
        <div class="form-group">
            <label class="form-label">タイトル</label>
            <input type="text" name="title" value="{{ old('title', $work->title) }}">
        </div>

        <!-- 本文 -->
        <div class="form-group">
            <label class="form-label">本文</label>
            <textarea name="content" rows="6">{{ old('content', $work->content) }}</textarea>
        </div>

        <!-- 動画URL -->
        <div class="form-group">
            <label class="form-label">動画URL</label>
            <input type="text" name="video_url" value="{{ old('video_url', $work->video_url) }}" placeholder="例: https://youtu.be/xxxx">
        </div>

        <!-- 横並び部分: カテゴリー + サービス -->
        <div class="form-row">
            <div class="form-group half-width">
                <label class="form-label">カテゴリー</label>
                <select name="type">
                    <option value="pr" {{ old('type', $work->type)=='pr' ? 'selected' : '' }}>PR</option>
                    <option value="branding" {{ old('type', $work->type)=='branding' ? 'selected' : '' }}>BRANDING</option>
                </select>
            </div>

            <div class="form-group half-width">
                <label class="form-label">サービス</label>
                <select name="service">
                    <option value="">選択なし</option>
                    <option value="gnstudio" {{ old('service', $work->service)=='gnstudio' ? 'selected' : '' }}>GN STUDIO</option>
                    <option value="gnmedia" {{ old('service', $work->service)=='gnmedia' ? 'selected' : '' }}>GN MEDIA</option>
                    <option value="gnacademy" {{ old('service', $work->service)=='gnacademy' ? 'selected' : '' }}>GN ACADEMY</option>
                </select>
            </div>
        </div>

        <!-- タグ -->
        <div class="form-group">
            <label class="form-label">タグ（カンマ区切り）</label>
            <input type="text" name="tags" value="{{ old('tags', $work->tags) }}">
        </div>

        <!-- 表示順 -->
        <div class="form-group">
            <label class="form-label">表示順</label>
            <input type="number" name="sort_order" value="{{ old('sort_order', $work->sort_order) }}" min="0">
        </div>

        <!-- 公開設定 -->
        <div class="form-group">
            <label>
                <input type="checkbox" name="is_published" value="1" {{ old('is_published', $work->is_published) ? 'checked' : '' }}>
                公開する
            </label>
        </div>

        <!-- ボタン -->
        <div class="form-actions">
            <button type="submit" class="submit-btn">更新する</button>
            <a href="{{ route('admin.works.index') }}">キャンセル</a>
        </div>
    </form>
</div>
@endsection
