<?php
require_once 'Coffee.php';
require_once 'Tea.php';
require_once 'Matcha.php';
require_once 'Dripper.php';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>喫茶マシーン</title>
</head>
<body>
<?php
$dripper = new Dripper();
$coffee = new Coffee();
$tea = new Tea();
$matcha = new Matcha();

// ミルクを注ぐ機能：ON
$dripper->setMilkStatus(true);

// コーヒーをセットして注ぐ
print('ミルクを注ぐ機能:ONコーヒーをセットして注ぎます。<br>');
print($dripper->dripDrink($coffee) . '<br><br>');

// 紅茶をセットして注ぐ
print('ミルクを注ぐ機能:ON紅茶をセットして注ぎます。<br>');
print($dripper->dripDrink($tea) . '<br><br>');

// 抹茶をセットして注ぐ
print('ミルクを注ぐ機能:ON抹茶をセットして注ぎます。<br>');
print($dripper->dripDrink($matcha) . '<br><br>');

// ミルクを注ぐ機能：OFF
$dripper->setMilkStatus(false);

// コーヒーをセットして注ぐ
print('ミルクを注ぐ機能:OFFコーヒーをセットして注ぎます。<br>');
print($dripper->dripDrink($coffee) . '<br><br>');

// 紅茶をセットして注ぐ
print('紅茶をセットして注ぎます。<br>');
print($dripper->dripDrink($tea) . '<br><br>');

// 抹茶をセットして注ぐ
print('抹茶をセットして注ぎます。<br>');
print($dripper->dripDrink($matcha) . '<br><br>');
?>
</body>
</html>
