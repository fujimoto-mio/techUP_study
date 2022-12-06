<!DOCTYPE html>
<html lang="ja">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>6-4</title>
</head>
<body>

<?php
$data = $_COOKIE['data1'];
try{
  if (isset($_POST['textBox1'])) {
    $textbox = $_POST['textBox1'];
    $timeout = time() + 10;
    $path = '/';
    $domain = '';
    setcookie('data1', $textbox, $timeout, $path, $domain);
    header("Location: " . $_SERVER['PHP_SELF']);
 
  } else {
   echo $data;
  }
} catch(Exception $e) {
  echo $e->getMessage(), "\n";
}

if(!empty($data)){
}
?>



<form method="post" action=""> 
     入力：
  <input type="text" name="textBox1" />

  <input type="submit" name="button1" value="Cookie書き込み" />
</form>
</body>
</html>