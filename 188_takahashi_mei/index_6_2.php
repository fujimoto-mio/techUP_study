<?php

$date = date("Y-m-d H:i:s");
printf("現在、%s<br>", $date);

$today = date("Y年m月d日");
$tomorrow = date("Y年m月d日", strtotime("1 day"));
$yesterday = date("Y年m月d日", strtotime("-1 day"));
$weekLater = date("Y年m月d日", strtotime("+1 week"));
$threeMonthsLater = date("Y年m月d日", strtotime("+3 months"));

printf("今日は%sです。<br>", $today);
printf("明日は%sです。<br>", $tomorrow);
printf("昨日は%sです。<br>", $yesterday);
printf("一週間後は%sです。<br>", $weekLater);
printf("３ヶ月後は%sです。<br>", $threeMonthsLater);

$days = floor((strtotime("+3 months") - time()) / (60 * 60 * 24));
printf("3ヶ月後の日付まで %d 日です。<br>", $days);

?>
