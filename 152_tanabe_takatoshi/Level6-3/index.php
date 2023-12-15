<?php
$file = fopen('member.csv', 'r');

if ($file === false) {
  die('ファイルを開けませんでした。');
}

while (($date = fgetcsv($file)) !== false) {
  echo "{$date[0]},{$date[1]},{$date[2]} . <br/>";
}

fclose($file);
