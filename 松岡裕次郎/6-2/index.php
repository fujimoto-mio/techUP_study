<?php
//現在の日付と時間
$today=date("Y-m-d H:i:s");
printf("現在、%s\n",$today);

//明日
$today=date("Y年m月d日");
$tomorrow=date("Y年m月d日",strtotime("1 day"));
$yesterday=date("Y年m月d日",strtotime("-1 day"));
$week=date("Y年m月d日",strtotime("1 week"));

printf( "今日は%sです。\n", $today);
printf( "明日は%sです。\n", $tomorrow);
printf( "昨日は%sです。\n", $yesterday);
printf( "一週間後は%sです。\n", $week);


//指定日の一ヶ月後の日付を計算
$anyday="2022-12-11";
$anyday_aftermonth=date("Y-m-d",strtotime('+3 month',strtotime($anyday)));
printf( "%sの三ヶ月後は、%sです。\n",$anyday, $anyday_aftermonth);
?>
