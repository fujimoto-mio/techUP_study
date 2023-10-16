@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('User List') }}</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Is Admin</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td class="editable" data-field="name" data-id="{{ $user->id }}">{{ $user->name }}</td>
                                <td class="editable" data-field="email" data-id="{{ $user->id }}">{{ $user->email }}</td>
                                <td>{{ $user->is_admin ? 'Yes' : 'No' }}</td>
                                <td>
                                    <button class="btn btn-primary btn-sm edit-btn" data-id="{{ $user->id }}">Edit</button>
                                    <button class="btn btn-danger btn-sm delete-btn" data-id="{{ $user->id }}">Delete</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // 編集ボタンのクリックイベント
    document.querySelectorAll('.edit-btn').forEach(button => {
        button.addEventListener('click', (event) => {
            const userId = event.target.getAttribute('data-id');
            const name = document.querySelector(`[data-field="name"][data-id="${userId}"]`).innerText;
            const email = document.querySelector(`[data-field="email"][data-id="${userId}"]`).innerText;

            // ユーザーIDを含めて編集用のルートにリダイレクト
            window.location.href = `/admin/users/${userId}/edit?name=${name}&email=${email}`;
        });
    });

    // 削除ボタンのクリックイベント
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', (event) => {
            const userId = event.target.getAttribute('data-id');
            const confirmDelete = confirm('本当にこのユーザーを削除しますか？');

            if (confirmDelete) {
                // 削除アクションを実行または削除用のルートにリダイレクト
                window.location.href = `/admin/users/${userId}/delete`;
            }
        });
    });
</script>
@endsection