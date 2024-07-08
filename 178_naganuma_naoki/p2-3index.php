<?php
//value1はvalue2より大きいと出力される
$value1 = 200;
$value2 = 100;
$text = 'man';

if ($value1 > $value2) {
    echo 'value1はvalue2より大きい';
} else {
    echo 'value1はvalue2より小さい';
}
?>

<?php 
//男性と出力される
$text = 'man';
if ($text === 'man') {
    echo '男性<br>';
} else if ($text === 'woman') {
    echo '女性<br>';
}
 
/****************************/
/** HTMLを使った処理が必要な場合、endif;で最後を閉じる **/
$text = 'success';
 if($text === 'success'):
?>
 <p>テストの結果は合格です。処理は正常に行われています。</p>
 <?php elseif($text === 'error'): ?>
 <p>テストの結果は失敗です。処理中にエラーが発生しています。</p>
<?php endif; ?>

 <?php 
  $is_active = true;
  $result = $is_active== true ? "active" :"default";
 
  echo $result;
  // active と出力されます
 
/****************************/
/** swtch case 〜  **/
$week = 'wednesday';

switch ($week) {
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
/** oから9までに繰り返しを表示します。 **/ 
for($val = 0; $val <= 10; $val++){
    echo $val. '<br/>';
}
 
?>
 
結果
0
1
2
3
4
5
6
 
 
 
<?php
/** 処理をスキップさせる場合、continueをいれる **/ 
echo '結果<br/>';
for($val = 0; $val <= 10; $val++){
    /* もし、5だったら５をスキップ */
    if ($val == 5){
      echo 'continue'. '<br/>';
      continue;
    }
    echo $val. '<br/>';
}
echo '終了';
 
?>
 
結果
0
1
2
3
4
continue
6
7
8
9
10
終了;
 
 
 
<?php
/** 処理を中断させる場合、breakをいれる **/ 
echo '結果<br/>';
for($val = 0; $val <= 10; $val++){
 
    /* もし、5だったら中断させてfor を抜ける */
    if ($val == 5){
      echo 'continue'. '<br/>';
      break;
    }
    echo $val. '<br/>';
}
echo '終了';
?>
 
結果
0
1
2
3
4
終了

<?php
$val = 0;

while ($val < 5) {
    echo $val;
   /*カウントしていく*/
    $val++;
}
?>
01234
 
<?php
$num = 0;
 
do{
 /* 0からカウントしていきます */
 print "num=".$num;
 $num += 1;
}while ($num < 3);
 
?>

 num=0 num=1 num=2
 <?php 
//配列の定義
$array = ['卵','牛乳','トマト','キャベツ','リンゴ','オレンジ'];
 
foreach ($array as $value){
    echo $value. "<br/>";
}
?>
卵
牛乳
トマト
キャベツ
リンゴ
オレンジ

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
買い物リスト1つ目は、卵です。
買い物リスト2つ目は、牛乳です。
買い物リスト3つ目は、トマトです。
買い物リスト4つ目は、キャベツです。
買い物リスト5つ目は、リンゴです。
買い物リスト6つ目は、オレンジです。

<?php 
//配列の定義
$array = ['卵','牛乳','トマト','キャベツ','リンゴ','オレンジ'];
 
foreach ($array as  $key =>$value){
    echo  $key.":".$value. "<br/>";
}
foreach ($array as  $key =>$value){
    echo  $key.":".$value;
}
?>