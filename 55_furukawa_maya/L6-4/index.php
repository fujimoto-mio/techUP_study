<?php
// セッション管理開始
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // フォームから送信された名前を取得
        $name = $_POST['name'];

        // 名前が空であればエラーを表示
        if (empty($name)) {
            throw new Exception("エラーです");
        }

        // 名前をCookieに保存（有効期限は10秒）
        setcookie("user", $name, time() + 10);

    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

// クッキーから名前を取得
$nameCookie = isset($_COOKIE["user"]) ? $_COOKIE["user"] : "";

?>

<!DOCTYPE html>
<html>
<head>
    <title>課題L6-4</title>
</head>
<body>
    <form method="post">
        <label for="name">名前を入力：</label>
        <input type="text" id="name" name="name" value="<?= $nameCookie ?>">
        <input type="submit" value="保存">
    </form>
</body>
</html>
