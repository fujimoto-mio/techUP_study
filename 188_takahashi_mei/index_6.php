<?php

$date = date("Y-m-d H:i:s");
echo "現在、".$date."<br>";

echo "今日は".date("Y年m月d日")."です。<br>";
echo "明日は" . date("Y年m月d日", strtotime("1 day")) . "です。<br>";
echo "昨日は" . date("Y年m月d日", strtotime("-1 day")) . "です。<br>";
echo "一週間後は" . date("Y年m月d日" , strtotime("+1 week")) . "です。<br>";
echo "３ヶ月後は".date("Y年m月d日" , strtotime("+3 month")) . "です。<br>";

$days = floor((strtotime("+3 months") - time()) / (60 * 60 * 24));
echo "3ヶ月後の日付まで " . $days ." 日です。<br>";

?>

