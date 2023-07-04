<!DOCTYPE html>
<html lang="ja">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>6-4</title>
</head>
<body>

<?php
$val = $_COOKIE['botton'];
try{
  if (isset($_POST['name'])) {
   $date = $_POST['name'];
   $timeout = time() + 10;
   $path = '/';
   $domain = '';
   setcookie('botton', $date, $timeout, $path, $domain);
   header("Location: " . $_SERVER['PHP_SELF']);

  } else {
   echo $val;
  }
} catch(Exception $e) {
  echo $e->getMessage(), "\n";
}


?>

<form method="post" action="">
     入力：
  <input type="text" name="name" />

  <input type="submit" name="button1" value="Cookie書き込み" />
</form>
</body>
</html>
