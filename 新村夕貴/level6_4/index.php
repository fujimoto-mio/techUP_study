<form method="post" action="">
  <input type="text" name="textBox" />
  <input type="submit" name="button" value="送信" />
</form>

<?php

$val = $_POST['button'];

try{
  if ($val != null) {
    $data = $_POST['textBox'];
    $timeout = time() + 10;
    $path = '/';
    $domain = '';
    setcookie('MyData001', $data, $timeout, $path, $domain);
    header("Location: " . $_SERVER['PHP_SELF']);
  } else {
    echo($_COOKIE['MyData001']);
  }
} catch(Exception $e) {
  echo $e->getMessage(), "\n";
}

?>