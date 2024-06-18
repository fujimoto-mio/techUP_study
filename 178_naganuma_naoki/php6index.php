<?php
//現在の日付と時間
$d = date("Y-m-d H:i:s");
printf("現在、%s\n", $d);
echo "<br>";

//昨日、明日、一週間後
$today = date("Y年m月d日");
$tomorrow = date("Y年m月d日", strtotime("1 day"));
$yesterday = date("Y年m月d日", strtotime("-1 day"));
$nextWeek = date("Y年m月d日", strtotime("7 day"));
printf("今日は%sです。\n", $today);
echo "<br>";
printf("明日は%sです。\n", $tomorrow);
echo "<br>";
printf("昨日は%sです。\n", $yesterday);
echo "<br>";
printf("一週間後は%sです。\n", $nextWeek);
echo "<br>";

//今日から３ヶ月後の日付
$today_3aftermonth = date("Y年m月d日", strtotime("+3 month"));
printf("%sの3ヶ月後は、%sです。\n", $today, $today_3aftermonth);
echo "<br>";

//3ヶ月後は何日後か
$timestamp_now = time();
$today_after_3months = strtotime("+3 month");
$days_diff = ($today_after_3months - $timestamp_now) / (60 * 60 * 24);
printf("3ヶ月後の日付まで%sです。\n", $days_diff);
