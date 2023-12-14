<?php
//課題１
$d = date("Y年m月d日 H時i分s秒");
printf("現在、%s", $d);
echo "<br/>";
//課題２
//昨日
$yesterday = date("Y年m月d日", strtotime("-1 day"));
printf("昨日は、%sです。", $yesterday);
echo "<br/>";
//明日
$tomorrow = date("Y年m月d日", strtotime("1 day"));
printf("明日は、%sです。", $tomorrow);
echo "<br/>";
//一週間後
$week = date("Y年m月d日", strtotime('7 day'));
printf("一週間後は、%sです。", $week);
echo "<br/>";
//課題３
//今日から3ヶ月後の日時と今日から何日後か表示
$today = new DateTime();
$after_month = clone $today; // $today のコピーを作成
$after_month->modify('+3 months');
$dateDiff = $today->diff($after_month);

echo "今日の日付は、" . $today->format('Y年m月d日') . '<br>';
echo "3ヶ月後の日付は、" . $after_month->format('Y年m月d日') . '<br>';
echo "今日から3ヶ月後は " . $dateDiff->days . " 日後です。";
