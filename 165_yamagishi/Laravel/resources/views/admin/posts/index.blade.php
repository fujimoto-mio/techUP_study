@extends('admin.layouts.admin')

@push('head')
    @vite('resources/css/admin/posts/index.css')
@endpush

@section('content')
<div class="admin-container">
    <h1 class="admin-title">NEWS & BLOG 投稿一覧</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="admin-actions">
        <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">新規作成</a>
    </div>

    <div class="table-wrapper">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>タイトル</th>
                    <th>タグ</th>
                    <th>公開状態</th>
                    <th>作成日</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @forelse($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->tags }}</td>
                        <td>{{ $post->is_published ? '公開' : '非公開' }}</td>
                        <td>{{ $post->created_at->format('Y-m-d') }}</td>
                        <td class="actions-cell">
                            <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-edit">編集</a>
                            <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" class="inline-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete" onclick="return confirm('本当に削除しますか？')">削除</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="no-posts">投稿はまだありません。</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="pagination">
        {{ $posts->links() }}
    </div>
</div>
@endsection
