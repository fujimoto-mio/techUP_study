<?php
return [
    'required' => 'この :attribute は必ず入力してください。',
    'max' => [
        'string' => ':attribute は :max 文字以下で入力してください。',
        'file' => ':attribute は :max KB以下のファイルをアップロードしてください。',
    ],
    'attributes' => [
        'name' => '名前',
        'email' => 'メールアドレス',
        'password' => 'パスワード',
        'image' => 'ファイル',
        'title' => 'タイトル',
        'comment' => 'コメント'
    ],
    'custom' => [
        'email' => [
            'required' => ':attribute は必須です。',
            'email' => ':attribute は正しいメールアドレスを入力してください.',
        ],
        'password' => [
            'required' => ':attribute は必須です。',
            'string' => ':attribute は文字列で入力してください。',
            'min' => ':attribute は :min 文字以上で入力してください。',
            'confirmed' => 'パスワードが確認用と一致しません。',
            'regex' => ':attribute は英字と数字を含む必要があります。',
        ],
        'image' => [
            'image' => ':attribute は画像ファイルである必要があります。',
            'mimes' => ':attribute は jpeg, png, jpg, gif のいずれかの形式である必要があります。',
        ],
        // 他のカスタムエラーメッセージも追加
    ],

    // 他のバリデーションルールのエラーメッセージも追加
];
