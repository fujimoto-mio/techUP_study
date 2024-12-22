<?php
//クラスファイルを読み込む

require_once 'Coffee.php';
require_once 'Tea.php';
require_once 'Dripper.php';
?>
<!DOCTYPE html>
<html lang="ja">
<meta charset="utf-8">
<head>
    <title>喫茶マシーン</title>
</head>
    <body>
<?php
    //ドリッパーオブジェクトを生成する
    $dripper = new Dripper();

    //コーヒーオブジェクトを生成する
    $coffee = new Coffee();

    //紅茶オブジェクトを生成する
    //※追加
    $tea = new Tea();

<<<<<<<< HEAD:194_yamashita_haruka/techup_php_8/index.php
========

>>>>>>>> 42c6f267d4718ce98589e2494e9290c533a2395a:188_takahashi_mei/index.php

    //ドリッパーにミルクを注ぐようにセットする
    print('ミルクを注ぐ機能：ON<br>');
    $dripper->setMilkStatus(true);

    //コーヒーを注いでみる
    print('コーヒーをセットして注ぎます。<br>');
    print($dripper->dripDrink($coffee) . '<br>');
    print('<br>');

    //ドリッパーにミルクを注ぐようにセットする
    print('ミルクを注ぐ機能：ON');
    $dripper->setMilkStatus(true);

    //紅茶を注いでみる
    print('紅茶をセットして注ぎます。<br>');
    print($dripper->dripDrink($tea) . '<br>');
    print('<br>');

    //ドリッパーにミルクを注がないようにセットする
    print('ミルクを注ぐ機能：OFF');
    //※追加
    $dripper->setMilkStatus(false);
    



    //コーヒーを注いでみる
    print('コーヒーをセットして注ぎます。<br>');
<<<<<<<< HEAD:194_yamashita_haruka/techup_php_8/index.php
    //※追加
    print($dripper->dripDrink($coffee) . '<br>');
========
    print($dripper->dripDrink($coffee) . "<br>");
>>>>>>>> 42c6f267d4718ce98589e2494e9290c533a2395a:188_takahashi_mei/index.php
    print('<br>');

    //紅茶を注いでみる
    print('紅茶をセットして注ぎます。<br>');
    //※追加
    print($dripper->dripDrink($tea) . '<br>');

<<<<<<<< HEAD:194_yamashita_haruka/techup_php_8/index.php
    print('<br>');

========
>>>>>>>> 42c6f267d4718ce98589e2494e9290c533a2395a:188_takahashi_mei/index.php
?>
    </body>

</html>
