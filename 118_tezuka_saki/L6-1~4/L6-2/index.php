<?php
//現在の日付と時間
$d = date("Y-m-d H:i:s");
echo ("<p>現在 $d</p>");

//昨日、明日、一週間後の日付
$tomorrow = date("Y年m月d日",strtotime("1 day"));
$yesterday = date("Y年m月d日",strtotime("-1 day"));
$next_week = date("Y年m月d日",strtotime("1 week"));

echo( "<p>明日は{$tomorrow}です。<br>
          昨日は{$yesterday}です。<br>
          一週間後は{$next_week}です。</p>" );

//指定日の三ヶ月後の日付を計算
$now = new DateTime();
$month = new DateTime();
$month->modify('+3 month');
$diff = $month->diff($now);

echo $month->format('三ヵ月後はY年m月d日です。');
echo ("<br>");
echo $diff->format('三ヵ月後は%a日後です。');
?>