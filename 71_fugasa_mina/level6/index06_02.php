<?php
 
echo '課題１：今日の日付と時間を取得';
echo '<br>'; //改行

$today = date("Y-m-d H:i:s");
print_r($today);

echo '<br>'; //改行
echo '<br>'; //改行
 
$str1 = "課題２： 昨日、明日、一週間後の日付ブラウザに表示";
echo $str1;

echo '<br>'; //改行

$objDateTime = new DateTime('2023-02-12 -1 day');//昨日
echo $objDateTime->format('Y-m-d');

echo '<br>'; //改行

$objDateTime = new DateTime('2023-02-12 +1 day');//今日
echo $objDateTime->format('Y-m-d');

echo '<br>'; //改行

$objDateTime = new DateTime('2023-02-12  +1 week');//１週間後
echo $objDateTime->format('Y-m-d');

echo '<br>'; //改行
echo '<br>'; //改行

$str2 = "課題３：今日から３ヶ月後の日付を表示。その日付が、今日から何日目後か表示";
echo $str2;

echo '<br>'; //改行
$anyday="2023-02-12";
$anyday_aftermonth=date("Y-m-d",strtotime('+3 month',strtotime($anyday)));
printf( "%sの3ヶ月後は、%sです。\n",$anyday, $anyday_aftermonth);


 
?>