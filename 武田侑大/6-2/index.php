<!DOCTYPE html>
<html lang="ja">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>6-2</title>
</head>
<body>

<?php
//現在
$now = new DateTime();
echo $now->format('現在はY年m月d日 H:i:s');

echo "<br>";

//昨日
$yesterday = new DateTime();
$yesterday->modify('-1 day');
echo $yesterday->format('昨日はY年m月d日');

echo "<br>";

//明日
$tomorow = new DateTime();
$tomorow->modify('+1 day');
echo $tomorow->format('明日はY年m月d日 ');

echo "<br>";

//一週間後
$week = new DateTime();
$week->modify('+1 week');
echo $week->format('一週間後はY年m月d日');

echo "<br>";

//三か月後
$threeMonth = new DateTime();
$threeMonth_day= $threeMonth->modify('+3 month');
echo $threeMonth->format('三か月後はY年m月d日 ');

echo "<br>";


//三か月まで
$end = strtotime('+3 month');
$now = strtotime('now');

$days = ceil(($end - $now) / (60*60*24));

while($days > 0) {
    $days++;
    $date_counter = '三か月後まであと ' . $days . ' 日';
    break;
} 

echo '<p>' . $date_counter . '</p>';
 ?>

</body>
</html>
