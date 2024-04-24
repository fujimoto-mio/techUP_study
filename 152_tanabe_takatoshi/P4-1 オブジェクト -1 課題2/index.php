<?php

require_once 'Patient.php';

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>techUPオブジェクト指向 課題</title>
</head>

<body>
  <?php
  $patient = new Patient('田中綾', 21, 'f', 1.6, 50);

  print($patient->selfIntroduction());
  print('<br>身長：' . $patient->getHeight() . 'm');
  print('<br>体重：' . $patient->getWeight() . 'kg');
  print('<br><br>');
  print('標準体重は' . $patient->calculateStandardWeight() . 'kgです。');
  ?>
</body>

</html>