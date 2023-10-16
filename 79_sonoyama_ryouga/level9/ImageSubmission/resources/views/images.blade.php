@extends('layouts.app')

@section('content')
<div class="container">
    <div id="page" class="fade-in">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <!-- 投稿のタイトルを表示 -->
                    <div class="card-header">{{ $post->title }}</div>

                    <!-- 投稿の本文を表示 -->
                    <div class="card-body">
                        <!-- 投稿に含まれるすべての画像を表示 -->
                        @foreach ($images as $image)
                        <img src="{{ $image->path }}" alt="Image">
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 追加: スペースを作成 -->
    <!-- ページ下部にスペースを追加するための div 要素 -->
    <div style="margin-bottom: 5rem;"></div>
</div>@endsection