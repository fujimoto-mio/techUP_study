@extends('layouts.app')

@section('content')
<h1>ユーザー一覧</h1>
<table>
    <tr>
        <th>ユーザー名</th>
        <th>管理者権限</th>
        <th>操作</th>
    </tr>
    @foreach($users as $user)
    <tr>
        <td>{{ $user->name }}</td>
        <td>
            <form action="{{ route('admin.toggle_admin', $user->id) }}" method="post">
                @csrf
                <input type="checkbox" name="is_admin" {{ $user->is_admin ? 'checked' : '' }}>
                <button type="submit">更新</button>
            </form>
        </td>
        <td>
            <a href="{{ route('admin.edit_user', $user->id) }}">編集</a>
            <form action="{{ route('admin.delete_user', $user->id) }}" method="post" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('本当に削除しますか？')">削除</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
<div style="margin-bottom: 200px;"></div> <!-- 追加: スペースを作成 -->
@endsection