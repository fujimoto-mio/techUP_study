<?php
$d=date("Y-m-d H:i:s");
printf("今日の日付、%s\n",$d);
echo "<br>";
 
$yesterday=date("Y年m月d日",strtotime("-1 day"));
$tomorrow=date("Y年m月d日",strtotime("1 day"));
$weekago=date("Y年m月d日",strtotime("1 week"));

printf( "昨日は%sです。\n", $yesterday);
printf( "明日は%sです。\n", $tomorrow);
printf( "1週間後はは%sです。\n", $weekago);
echo "<br>";
 
$month=date("Y年m月d日",strtotime("3 month"));
printf( "3か月後は%sです。\n", $month);
$m=date("Y-m-d H:i:s",strtotime("3 month"));
echo '今日から'.((strtotime($m) - strtotime($d))/ 86400 ).'日後';