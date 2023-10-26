<?php


$name='tanaka';

echo 'こんにちは、'. $name. 'です'.PHP_EOL;

$str1 = '表示を';
$str2 = '確認してみよう。<br>';
$str3 =$str1.$str2;
printf($str3);

$x = 10;

if($x != 0){
    $str = 'xは0ではないです<br>';
}
else if($x == 9){
    $str = '<div>xは9です</div>';
}
else if($x == 10){
    $str = '<div>xは10です</div>';
}
else{
    $str = '<div>xは0,9,10ではないです</div>';
}

printf($str);

$i = 1;

switch ($i)
{
    case 1:
        $str = "<p>iは1です。</p>";
    case 2:
        $str = "<p>iは2です。</p>";
    case 3:
        $str = "<p>iは3です。</p>";
    default:
        $str = "<p>iは1~3以外です。</p>";
}

printf($str);

for($i=1; $i<=5; $i++){
    printf( $i);
    printf( ",");
}

$ships = array(1, 2, 3, 4, 5);

foreach ($ships as $ship){
    print $ship;
    print "</br>";
}

print_r("while文の処理");
$i = 1;

while($i<=5){
    print $i;
    print "</br>";
    $i++;
}

printf("do while文の処理");
$i = 1;

do{
    print $i;
    print "</br>";
    $i++;
}while($i <= 5);
?>