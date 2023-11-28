<?php
// xamppローカルサーバを利用している場合、このphpファイルを、htdocs 配下にいれてください。/htdocs/index.php
// PHPの基本構文を記述します。
$name = 'tanaka';
 
/*  echo print で表示できます。 */
echo 'こんにちは、'. $name .'です'.PHP_EOL;
 
$str1 = '表示を';
$str2 = '確認してみよう。<br>';
$str3 = $str1.$str2;
printf($str3); 

$x=100;
echo $x."<br>";

$y=200;
print($x + $y);
