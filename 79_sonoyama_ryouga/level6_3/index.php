<!DOCTYPE html>
<html lang="jp">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>

  <?php
  //ファイルを開く
  $fp = fopen("member.csv", "r");

  //取得する
  while ($line = fgets($fp)) {
    echo "$line<br>";
  }

  //ファイルを閉じる
  fclose($fp);
  ?>

</body>

</html>