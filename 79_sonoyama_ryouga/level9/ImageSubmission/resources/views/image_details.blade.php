@extends('layouts.app')

@section('content')
<div class="container">
    <div id="page" class="fade-in">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <!-- 投稿内容のタイトル -->
                    <div id="page" class="fade-in">
                        <div class="card-header">
                            <h3>投稿内容</h3>
                        </div>
                        <!-- 投稿内容の本文 -->
                        <div class="card-body">
                            <!-- 投稿のタイトルを表示 -->
                            <h5 class="card-title">{{ $image->title }}</h5>
                            <!-- 投稿の画像を表示 -->
                            <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $image->title }}" class="img-fluid mb-3">
                            <!-- 作品コメントを表示 -->
                            <div class="author-comment">
                                <h3>作品コメント</h3>
                                <p class="card-text">{{ $image->comment }}</p>
                            </div>
                            <!-- ホームに戻るボタン -->
                            <a href="{{ route('home') }}" class="btn btn-primary">ホームに戻る</a>
                        </div>
                    </div>
                </div>
                <!-- 追加: スペースを作成 -->
                <!-- ページ下部にスペースを追加するための div 要素 -->
                <div style="margin-bottom: 5rem;"></div>
            </div>
        </div>
    </div>
    <!-- 追加: スペースを作成 -->
    <!-- ページ下部にスペースを追加するための div 要素 -->
    <div style="margin-bottom: 5rem;"></div>
</div>
@endsection