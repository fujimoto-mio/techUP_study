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

    //ドリッパーにミルクを注ぐようにセットする
    print('ミルクを注ぐ機能：ON');
    $dripper->setMilkStatus(true);
    //ミルクコーヒー（微糖

    //コーヒーを注いでみる
    print('コーヒーをセットして注ぎます。<br>');
    print($dripper->dripDrink($coffee) . '<br>');
    print('<br>');

    //ドリッパーにミルクを注ぐ
    print('ミルクを注ぐ機能：ON');//注ぐ
    $dripper->setMilkStatus(true);
    print('紅茶をセットして注ぎます。<br>');
    print($dripper->dripDrink($tea) . '<br>');//
    print('<br>');

     //ドリッパーにミルクを注ぐ
     print('ミルクを注ぐ機能：OFF');//注がない
     $dripper->setMilkStatus(false);
     print('コーヒーをセットして注ぎます。<br>');
     print($dripper->dripDrink($coffee) . '<br>');//ミルクはそそがない
     print('<br>');//つまりコーヒー

    //紅茶を注いでみる
    print('紅茶をセットして注ぎます。<br>');
    $dripper->setMilkStatus(false);
    print($dripper->dripDrink($tea) . '<br>');
    print('<br>');//ティー

?>
    </body>
</html>
