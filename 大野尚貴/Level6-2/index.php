
<?php
//現在の日付と時間
$d=date("Y-m-d H:i:s");
printf("現在、%s\n",$d);
 
//明日,昨日,1週間後
$=date("Y年m月d日");
$tomorrow=date("Y年m月d日",strtotime("1 day"));
$yesterday=date("Y年m月d日",strtotime("-1 day"));
$week=date("Y年m月d日",strtotime("1 week"));
 
printf( "今日は%sです。\n", $today);
printf( "明日は%sです。\n", $tomorrow);
printf( "昨日は%sです。\n", $yesterday);
printf( "一週間後は%sです。\n", $week);

 
//指定日の3ヶ月後の日付を計算
$anyday="2023-02-16";
$anyday_aftermonth=date("Y-m-d",strtotime('+3 month',strtotime($anyday)));
printf( "%sの3ヶ月後は、%sです。\n",$anyday, $anyday_aftermonth);
?>