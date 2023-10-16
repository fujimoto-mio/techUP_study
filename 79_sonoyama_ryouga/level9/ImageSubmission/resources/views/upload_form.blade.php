@extends('layouts.app')

@section('content')
<div id="page" class="fade-in">
    <!-- フォームの開始 -->
    <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data" novalidate>
        @csrf

        <!-- タイトル入力フィールド -->
        <div class="mb-3">
            <label for="title" class="form-label">タイトル</label>
            <input type="text" class="form-control" id="title" name="title">
            @error('title')
            <div class="alert alert-danger" style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <!-- 画像アップロードフィールド -->
        <div class="mb-3">
            <label for="image" class="form-label">画像を選択してアップロード</label>
            <input type="file" class="form-control" id="image" name="image">
            @error('image')
            <div class="alert alert-danger" style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <!-- コメント入力フィールド -->
        <div class="mb-3">
            <label for="comment" class="form-label">コメント</label>
            <textarea class="form-control" id="comment" name="comment" rows="4"></textarea>
            @error('comment')
            <div class="alert alert-danger" style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <!-- 投稿ボタン -->
        <button type="submit" class="btn btn-primary">投稿</button>

    </form>
    <!-- スペースを作成 -->
    <div style="margin-bottom: 300px;"></div>
</div>
@endsection