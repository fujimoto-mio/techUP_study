<?php
$kasan = 10 + 2;
$genzan = 10 - 2;
$jozan = 10 * 2;
$josan = 10 / 2;
$joyo = 10 % 3;

printf($kasan);

echo "<br>";
printf($genzan);
echo "<br>";
printf($jozan );
echo "<br>";
printf($joyo );
?>

<?php
$a = 1;
$a = $a + 1;
echo $a;
?>
結果2になります

<?php
$a = 1;
$a += 1;
echo $a;
?>
結果2になります

<?php
$a = 0;
++$a;
echo $a;
++$a;
echo $a;
?>
結果1 その次2になります

<?php
$a = 0;
$a++;
echo $a;
$a++;
echo $a;
?>
結果1 その次2になります

<?php
$a = 5;
$a--;
echo $a;
?>
結果4になります

<?php

const CONSTANT_STR1 = 'techUP';
const CONSTANT_STR2 = 'Engineer';

const CONST_INT1 = 5.1;
const CONST_INT2 = 1000;

echo CONSTANT_STR1;
echo CONSTANT_STR2;

echo "<br>";

echo CONST_INT1;
echo "<br>";
echo CONST_INT2;

const CONST_INT3 = 1;

echo CONST_INT3;
?>

<?php
$bool1 = true;
$bool2 = false;

$int1 = -1;
$int2 = 0;

$float = 3.14;

$string1 = '文字列';
$string2 = '';

$array1 = ['apple','banana'];

$array2 = ['apple'=>'リンゴ','banana'=>'バナナ'];

$test = null;

printf($bool1);
printf($bool2);

printf($int1);
printf($int2);

printf($float);

printf($string1);
printf($string2);

print_r($array1);
print_r($array2);
?>