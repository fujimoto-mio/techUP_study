<?php
require_once 'Coffee.php';
require_once 'Tea.php';
require_once 'Dripper.php';
require_once 'Matcha.php'
require_once 'Coffee.php';
require_once 'Tea.php';
require_once 'Dripper.php';

require_once 'Patient.php';
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
      $tea = new tea();
      $matcha = new matcha();
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
      print('抹茶をセットして注ぎます。<br>');
      print($dripper->dripDrink($matcha) . '<br>');
      print('<br>');
      print('ミルクを注ぐ機能:OFF');
      $dripper->setMilkStatus(false);
      print('コーヒーをセットして注ぎます。<br>');
      print($dripper->dripDrink($coffee) . '<br>');
      print('<br>');
      print('紅茶をセットして注ぎます。<br>');
      print($dripper->dripDrink($tea) . '<br>');
      print('<br>');
      print('抹茶をセットして注ぎます。<br>');
      print($dripper->dripDrink($matcha) . '<br>');
      print('<br>');
      ?>
      </body>
      </html>
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

 <meta charset="utf-8">
 <head>
  <title>techUP オブジェクト指向 課題</title>
 </head>
 <body>

<?php
$patient = new Patient('深堀尋景', 21, 'm', 1.8, 62);

print($patient -> selfIntroduction());
print('<br>身長：' . $patient -> getHeight() . 'm');
print('<br>体重：' . $patient -> getWeight() . 'kg');
print('<br><br>');
print('標準体重は' . $patient -> calculateStandardWeight() . 'kgです。');
?>
 </body>
</html>
