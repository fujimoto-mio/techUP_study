<!DOCTYPE HTML>
 <html lang="ja">
 <head>
 <meta charset="UTF-8">
 <title>index.php</title>
 </head>
 <body>
 <form method="post" action="index.php">
 名前：<input type="text" name="name">
 <input type="submit" value="送信">
 </form>

 <?php
   if( isset($_COOKIE["user"]) ){
     $var=$_COOKIE["user"];
     echo "クッキーの値「" . $var . "\n";
   setcookie("user", "name", time()-60);
   echo "」のクッキーを削除しました。\n";
 } else {
   if( setcookie("user", "name", time()+60*60) ) {// １時間で切れるクッキー 
     echo "クッキーをセットしました。";
   } else {
     echo "クッキーのセットに失敗しました。ブラウザの設定を確認してください。";
   }
 }

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