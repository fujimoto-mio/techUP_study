<?php

$d = date("Y-m-d H:i:s");
printf("現在、%s<br>",$d);

$today = date("Y年m月d日");
$tomorrow = date("Y年m月d日",strtotime("1 day"));
$yesterday = date("Y年m月d日",strtotime("-1 day"));
$oneWeekLater = date("Y年m月d日",strtotime("+1 week"));
$threeMonthLater = date("Y年m月d日",strtotime("+3 month"));

printf("今日は%sです。<br>",$today);
printf("明日は%sです。<br>",$tomorrow);
printf("昨日は%sです。<br>",$yesterday);
printf("一週間後は%sです。<br>",$oneWeekLater);
printf("３ヶ月後は%sです。<br>",$threeMonthLater);

$todayA = date("Y-m-d");
$threeMonthsLaterA = date("Y-m-d", strtotime("+3 months", strtotime($todayA)));
$a = strtotime($threeMonthsLaterA) - strtotime($todayA);
$difference = floor($a / (60 * 60 * 24));

printf("３ヶ月後の日付まで%s日です。",$difference);

?>