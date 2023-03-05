<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>index.php</title>
</head>
<body>
<form method="post" action="index.php">
名前<input type="text" name="name">
<input type="button" name="btn1" valte="送信">
</form>

<?php
  setcookie("user", "name", time()-60);
  $var=$_COOKIE["user"];

  try{
    if(isset($POST["name"])){
        if($POST["name"] == ""){
            throw new Exception("入力してからボタンを押してください。<br>");
            }        
        }
    } catch (Exception $e) {
        echo $e->getMessage();
         }finally{ 
            echo "処理が終了しました";
            }
            
            session_set_cookie_params(10);
          session_start();
          if (!isset($_SESSION['count'])) {
              $_SESSION['count'] = 1;
          } else {
              $_SESSION['count']++;
          }
          echo $_SESSION['count']."回目の訪問です。";              
          ?> 
</body>
</html>