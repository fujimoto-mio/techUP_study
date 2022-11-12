<form action="" method="post">
    <label for="account">名前：</label>
    <input type="text" name="account" id="account" value="<?php echo htmlspecialchars($_COOKIE['account'], ENT_QUOTES | ENT_HTML5); ?>">
    <button type="submit">送信</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $account = filter_input(INPUT_POST, 'account');
  setcookie('account', $account, time() + 10);
}

try{
  if(empty($_COOKIE['account'])){
    throw new Exception('※入力されていません');
  }

}catch(Exception $e){ //例外をcatchしエラーメッセージを表示します。
  echo $e->getMessage(), "\n";
}

?>