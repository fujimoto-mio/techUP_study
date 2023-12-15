<?php
try {
  // Cookieから名前の値を取得
  $name = isset($_COOKIE['user_name']) ? $_COOKIE['user_name'] : '';
  // フォームが送信された場合
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 入力された名前を取得
    $inputName = isset($_POST['user_name']) ? $_POST['user_name'] : '';
    // 入力が空の場合はエラーをスロー
    if (empty($inputName)) {
      throw new Exception('名前を入力してください。');
    }
    // 名前をCookieに保存（有効期限を10秒に設定）
    setcookie('user_name', $inputName, time() + 10, '/');
    $name = $inputName;
  }
} catch (Exception $e) {
  // エラーメッセージを表示
  echo 'エラー:' . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cookie</title>
</head>

<body>
  <form action="" method="post">
    <label for="user_name">名前:</label>
    <input type="text" id="user_name" name="user_name" value="<?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?>">
    <input type="submit" value="保存">
  </form>
</body>

</html>