<?php
$value1 = 200;
$value2 = 100;

if ($value1 > $value2){
    echo 'value1はvalue2より大きい';
}else{
    echo 'value1はvalue2より小さい';
}
?>

<?php
$text = 'man';
if($text === 'man'){
   echo '男性'; 
}else if($text === 'woman'){
    echo '女性';
}
?>

<?php
$text = 'success';
if($text === 'success'):
?>
<p>テストの結果は合格です。処理は正常に行われています。</p>
<?php elseif($text === 'error'): ?>
<p>テストの結果は失敗です。処理中にエラーが発生しています。</p>
<?php endif; ?>

<?php
$is_active = true;
$result = $is_active== true ? "active" : "default";

echo $result;
echo "<br>";
?>

<?php
$week = 'wednesday';
switch($week){
    case 'monday':
        echo '月曜日';
        break;
    case 'tuesday':
        echo '火曜日';
        break;  
    case 'wednesday':
        echo '水曜日';
        break; 
    case 'thursday':
        echo '木曜日';
        break;
    case 'friday':
        echo '金曜日';
        break;
    case 'saturday':
        echo '土曜日';
        break;
    case 'sunday':
        echo '日曜日';
        break;
    default:
        echo '何曜日ですか？';
        break;
}
echo "<br>";
?>

<?php
$old = 18;

if($old > 10 && $old < 30){
    printf ("変数は10より大きく30より小さい");
}
echo "<br>";

$sugaku = 45;
$eigo = 82;

if($sugaku > 50 || $eigo > 50){
    printf ("合格");
}
echo "<br>";

$x = true;

if($x ){
    echo "真です";
}else{
    echo "偽です";
}
echo "<br>";

if(!$x){
    echo "偽です";
}else{
    echo "真です";
}
echo "<br>";
?>

<?php

for($val =0; $val <= 10; $val++){
    echo $val.  '<br/>';
}
?>

<?php
echo '結果<br/>';
for($val = 0; $val <= 10; $val++){
    if($val == 5){
        echo 'continue'. '<br/>';
        continue;
    }
    echo $val. '<br/>';
}
echo '終了';
echo '<br>';
?>

<?php
echo '結果<br/>';
for($val = 0; $val <= 10; $val++){
    if ($val == 5){
      break;
    }
    echo $val. '<br/>';
}
echo '終了';
echo '<br>';
?>

<?php
$val = 0;
while ($val < 5) {
    echo $val;
    $val++;
}
echo '<br>';
?>

<?php
$num = 0;
do{
 print "num=".$num;
 $num += 1;
}while ($num < 3);
 echo '<br>';
?>

<?php
$array = ['卵','牛乳','トマト','キャベツ','リンゴ','オレンジ'];
foreach ($array as $value){
    echo $value. "<br/>";
}
?>

<?php
$bag = [
        'リスト1' => '卵',
        'リスト2' => '牛乳',
        'リスト3' => 'トマト',
        'リスト4' => 'キャベツ',
        'リスト5' => 'リンゴ',
        'リスト6' => 'オレンジ'
    ];
foreach ($bag as $key => $value){
    echo '買い物'. $key. 'つ目は、'. $value. 'です。<br/>';
}
?>
 
<?php
$array = ['卵','牛乳','トマト','キャベツ','リンゴ','オレンジ'];
foreach ($array as  $key =>$value){
    echo  $key.":".$value. "<br/>";
}
?>