<?php
// TODO POST通信で送られてきたデータが空かどうかを判定する関数を作成しよう
// 関数名：任意
// 引数：$value
// 処理①：$valueが空かどうかを判定し、空の場合は例外を発生させる
// 　　　 エラーメッセージは「何も入力されていません」
// 処理②：$valueが空でない場合は、setcookie("name", $name, time()+10);

function human ($value){//仮引数

  if(empty($value)){
    throw new Exception("何も入力されていません");
  }else{
    if(setcookie("name", $value, time()+10));
  }
  
}

if (isset($_POST["user"])) {
  $name = $_POST["user"];
  // TODO作成した関数を呼び出す
  // 呼び出しの記述をtry-catchで囲う
  // catchブロックの処理ではエラーメッセージの出力を行う
  // finallyブロックは記載なし
try{
  human($name);
}catch(Exception $e){
  echo $e->getMessage();

}
}

if (isset($_COOKIE["name"])) {
  $var = $_COOKIE["name"];
  echo $var;
}
?>

<body>
  <p>名前
    <br>
  <form action="index.php" method="post">
    <input type="text" name="user">
    <input type="submit">
  </form>
</body>