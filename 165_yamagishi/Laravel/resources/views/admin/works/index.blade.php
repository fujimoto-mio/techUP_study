@extends('admin.layouts.admin')

@push('head')
    @vite('resources/css/admin/works/index.css')
@endpush

@section('content')
<div class="admin-container">
    <h1 class="admin-title">WORKS 投稿一覧</h1>

    <div class="admin-actions">
        <a href="{{ route('admin.works.create') }}" class="btn btn-primary">新規作成</a>
    </div>

    <div class="table-wrapper">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>タイトル</th>
                    <th>表示順</th>
                    <th>公開</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @forelse($works as $work)
                    <tr>
                        <td>{{ $work->id }}</td>
                        <td>{{ $work->title }}</td>
                        <td>{{ $work->sort_order }}</td>
                        <td>{{ $work->is_published ? '公開' : '非公開' }}</td>
                        <td class="actions-cell">
                            <a href="{{ route('admin.works.edit', $work) }}" class="btn btn-edit">編集</a>
                            <form action="{{ route('admin.works.destroy', $work) }}" method="POST" class="inline-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('削除しますか？')" class="btn btn-delete">削除</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="no-posts">実績はまだありません。</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="pagination">
        {{ $works->links() }}
    </div>
</div>
@endsection