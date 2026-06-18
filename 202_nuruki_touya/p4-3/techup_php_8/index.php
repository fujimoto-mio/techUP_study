<?php
//クラスファイルを読み込む
require_once 'Coffee.php';
require_once 'Tea.php';
require_once 'Dripper.php';
require_once "Matcha.php";
?>
<!DOCTYPE html>
<html lang="ja">
<meta charset="utf-8">
<head>
    <title>喫茶マシーン（202 塗木統耶 P4-3課題）</title>
</head>
    <body>
<h1>
    202_塗木 統耶 P4-3　課題
</h1>
<?php
    //ドリッパーオブジェクトを生成する
    $dripper = new Dripper();

    //コーヒーオブジェクトを生成する
    $coffee = new Coffee();

    //紅茶オブジェクトを生成する
    //※追加
    $tea = new tea();

    //抹茶オブジェクトを生成するp4-3の課題
    $matcha = new Matcha();

    //ドリッパーにミルクを注ぐようにセットする
    print('ミルクを注ぐ機能：ON');
    $dripper->setMilkStatus(true);

    //コーヒーを注いでみる
    print('コーヒーをセットして注ぎます。<br>');
    print($dripper->dripDrink($coffee) . '<br>');
    print('<br>');

    //紅茶を注いでみる
    print('ミルクを注ぐ機能：ON');
    print('紅茶をセットして注ぎます。<br>');
    print($dripper->dripDrink($tea) . '<br>');
    print('<br>');

    //抹茶を注ぐ！p4-3の課題
    print('ミルクを注ぐ機能：ON');
    print('抹茶をセットして注ぎます。<br>');
    print($dripper->dripDrink($matcha) . '<br>');
    print('<br>');

    //ドリッパーにミルクを注がないようにセットする
    print('ミルクを注ぐ機能：OFF');
    //※追加
    $dripper->setMilkStatus(false);

    //コーヒーを注いでみる
    print('コーヒーをセットして注ぎます。<br>');
    //※追加
    print($dripper->dripDrink($coffee) . "<br>");
    print('<br>');

    //紅茶を注いでみる
    print('紅茶をセットして注ぎます。<br>');
    //※追加E
    print($dripper->dripDrink($tea) . "<br>");
    print('<br>');

    //抹茶をそそぐ～！p4-3の課題
    print('抹茶をセットして注ぎます。<br>');
    print($dripper->dripDrink($matcha) . '<br>');
    print('<br>');

?>

    </body>
</html>
