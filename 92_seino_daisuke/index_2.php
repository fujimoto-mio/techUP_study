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

$bool1 = true;
$bool2 = false;

$int1 = -1;
$int2 = 0;
$float = 3.14;

$string1 = "文字列";
$string2 = "";

$array1 = ['apple', 'banana'];
$array2 = ['apple' => 'リンゴ', 'banana' => 'バナナ'];

$test = null;

?>
<!DOCTYPE html>
<html lang="ja">
<meta charset="UTF-8">
<title>文字列の扱い</title>
 <body>
    <p>論理型:<?php echo $bool1; ?></p>
    <p>論理型:<?php echo $bool2; ?></p>
    <p>整数型:<?php echo $int1; ?></p>
    <p>整数型:<?php echo $int2; ?></p>
    <p>浮動小数点型:<?php echo $float; ?></p>
    <p>文字列型:<?php echo $string1; ?></p>
    <p>文字列型:<?php echo $string2; ?></p>
    <p>配列型:<?php print_r($array1); ?> 変数の値に関する情報を解り易い形式で表示します。</p>
    <p>配列型:<?php print_r($array2); ?></p>
    <p>ヌル型:<?php echo $test; ?></p>
 <body>
</html>

<php
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
結果1 その次２になります

<?php
$a = 0;
$a++;
echo $a;
$a++;
echo $a;
?>
結果1　その次２になります

<?php
$a = 5;
$a--;
echo $a;
?>
結果4になります

<?php
const CONSTANT_STR1 = 'techUP';
const CONSTANT_STR2 = 'Engineer';

const CONSTANT_INT1 = 5.1;
const CONSTANT_INT2 = 1000;

echo CONSTANT_STR1;
echo CONSTANT_STR2;

echo "<br>";

echo CONSTANT_INT1;
echo "<br>";
echo CONSTANT_INT2;

//CONSTANT_INT1 = 1;

$bool1 = true;
$bool2 = false;

$int1 = -1;
$int2 = 0;

$float = 3.14;

$string1 = '文字列';
$string2 = '';

$array1 = ['apple', 'banana'];
$array2 = ['apple' => 'リンゴ', 'banana' => 'バナナ'];

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