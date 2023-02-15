<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>課題</title>
</head>
</body>
</html>
    <body>
 		<form action="index6_4.php" method="post">
 			お名前：<input type="text" name="name" />
 			<input type="submit" value="送信" />
  		</form>

        <!-- 課題記述方法
        1.名前を入力するてテキストボックスをブラウザに表示してください。
        2.Cookieを利用して　データを保存してください。
        3.空を入力した場合、try-catchでシステムエラーを出してください
        4.ブラウザを再起動しても入力値が保存されるようにしてください。
        5.10秒後の入力値が削除されているようにしてください。 -->

  		<?php
        setcookie("UserName", "name", time()+60*5);
        var_dump($_COOKIE['UserName']);

        try {
            if(isset($_POST["name"])){
                      if($_POST["name"] == ""){
                          throw new Exception("入力してからボタンを押してください。<br>");
                       }        
             }
            } catch (Exception $e) {
                  echo $e->getMessage();
            }finally{  //finallyブロックでメッセージが表示します。
                echo "処理が終了しました";
            }

          // セッションの有効期限を10秒に設定
          session_set_cookie_params(10);
          // セッション管理開始
          session_start();
          if (!isset($_SESSION['count'])) {
              // キー'count'が登録されていなければ、1を設定
              $_SESSION['count'] = 1;
          } else {
              //  キー'count'が登録されていれば、その値をインクリメント
              $_SESSION['count']++;
          }
          echo $_SESSION['count']."回目の訪問です。";              
          ?>
    </body>
</html>

