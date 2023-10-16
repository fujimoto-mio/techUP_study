@extends('layouts.app')

@section('content')
<div class="container">
    <div id="page" class="fade-in">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">ホームページ</div>

                    <div class="card-body">
                        <!-- 新着投稿のタイトルと説明 -->
                        <h3>新着投稿</h3>
                        <p>すべてのユーザーの投稿が新着順で表示されます。</p>
                        <!-- 新着投稿のリスト -->
                        <!-- 最新の10件の投稿を表示 -->
                        <ul>
                            @php
                            $imageCount = 0;
                            @endphp
                            @foreach ($latestPosts as $post)
                            @if ($post->getImageUrl() && $imageCount < 10) 
                            <li>
                                <!-- 投稿の画像とタイトルをリンクとして表示 -->
                                <a href="{{ route('post.show', ['id' => $post->id]) }}">
                                    <img src="{{ $post->getImageUrl() }}" alt="{{ $post->title }}">
                                </a>
                            </li>
                                @php
                                $imageCount++;
                                @endphp
                                @endif
                                @endforeach
                        </ul>

                        <!-- 追加: スペースを作成 -->
                        <!-- ページ下部にスペースを追加するための div 要素 -->
                        <div style="margin-bottom: 5rem;"></div> 

                        <!-- いいね多い順のタイトルと説明 -->
                        <h3>いいね多い順</h3>
                        <p>すべてのユーザーの投稿がいいね順で表示されます。</p>
                        <!-- いいね多い順のリスト -->
                        <!-- いいねが多い10件の投稿を表示 -->
                        <ul>
                            @php
                            $imageCount = 0;
                            @endphp
                            @foreach ($popularPosts as $post)
                            @if ($post->getImageUrl() && $imageCount < 10) 
                            <li>
                                <!-- 投稿の画像とタイトル、いいねの数をリンクとして表示 -->
                                <a href="{{ route('post.show', ['id' => $post->id]) }}">
                                    <img src="{{ $post->getImageUrl() }}" alt="{{ $post->title }}">
                                    <!-- いいねの数を表示 -->
                                    <div>
                                        Likes: {{ $post->likes_count }}
                                    </div>
                                </a>
                            </li>
                                @php
                                $imageCount++;
                                @endphp
                                @endif
                                @endforeach
                        </ul>

                        <!-- 追加: スペースを作成 -->
                        <!-- ページ下部にスペースを追加するための div 要素 -->
                        <div style="margin-bottom: 5rem;"></div> 

                        <!-- エラーメッセージがある場合は表示 -->
                        @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
