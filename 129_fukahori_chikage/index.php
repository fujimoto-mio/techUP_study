<?php
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
      $dripper = new Dripper();
      $coffee = new Coffee();
      //※追加
      $tea = new tea();
      print('ミルクを注ぐ機能:ON');
      $dripper->setMilkStatus(true);
      print('コーヒーをセットして注ぎます。<br>');
      print($dripper->dripDrink($coffee) . '<br>');
      print('<br>');
      print('紅茶をセットして注ぎます。<br>');
      print($dripper->dripDrink($tea) . '<br>');
      print('<br>');
      print('ミルクを注ぐ機能:OFF');
      //※追加
      $dripper->setMilkStatus(false);
      print('コーヒーをセットして注ぎます。<br>');
      //※追加
      print($dripper->dripDrink($coffee) . '<br>');
      print('<br>');
      print('紅茶をセットして注ぎます。<br>');
      //※追加
      print($dripper->dripDrink($tea) . '<br>');
      print('<br>');
      ?>
      </body>
      </html>
