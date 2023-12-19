<form method="post" action="">
  <input type="text" name="textBox" />
  <input type="submit" name="button" value="送信" />
</form>

<?php

$data = $_COOKIE['MyData001'];

try{
  if (isset($_POST['textBox'])) {
    $textbox = $_POST['textBox'];
    $timeout = time() + 10;
    $path = '/';
    $domain = '';
    setcookie('MyData001', $textbox, $timeout, $path, $domain);
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
