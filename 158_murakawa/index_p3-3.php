<?php

date_default_timezone_set('Asia/Tokyo');

//現在の日付と時間
$d=date("Y-m-d H:i:s");
printf("現在、%s\n",$d);
echo '<br>';

//明日
$today=date("Y年m月d日",);
$tomorrow=date("Y年m月d日",strtotime("1 day"),);
 
printf( "今日は%sです。\n", $today,'<br>');
echo '<br>';
printf( "明日は%sです。\n", $tomorrow,'<br>');
echo '<br>';

//昨日
$yesterday=date("Y年m月d日",strtotime("-1 day"));
 
printf( "昨日は%sです。\n", $yesterday,'<br>');
echo '<br>';
 
//一週間後
$week=date("Y年m月d日",strtotime("7 day"));
 
printf( "一週間後は%sです。\n", $week,'<br>');
echo '<br>';

//三か月後
$month=date("Y年m月d日",strtotime("90 day"));
 
printf( "3か月後は%sです。\n", $month,'<br>' );
echo '<br>';

//指定日の3ヶ月後の日付を計算
// $anyday="2024-08-03";
$anyday = $date_time = date("Y-m-d H:i:s");
$date_time0 = date("Y-m-d");
$anyday_aftermonth = date("Y-m-d",strtotime('+90 days',strtotime($anyday)));

$date_time = new DateTime($date_time0);
$date_time2 = new DateTime($anyday_aftermonth);

$diff = $date_time->diff($date_time2);
$answer = $diff->days;

// printf( "%sの3ヶ月後は、%sです。\n",$anyday, $anyday_aftermonth);
echo "3か月後の日付まで" .$answer."日です。";


?> 