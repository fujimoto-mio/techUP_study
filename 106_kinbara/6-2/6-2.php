
<?php

//課題１
//今日の日付と時間を取得
$d=date("Y-m-d H:i:s");
print "課題１\n今日の日付と時間";
print "<br>";
print "$d";
print "<br>";

//課題2
//昨日
$yesterday=date("Y-m-d",strtotime("-1 day"));
print "課題2-1\n昨日";
print "<br>";
print "$yesterday";
print "<br>";

//明日
$tomorrow=date("Y-m-d",strtotime("1 day"));
print "課題2-2\n明日";
print "<br>";
print "$tomorrow";
print "<br>";

//一週間後
$nextweek=date("Y-m-d",strtotime("1 week"));
print "課題2-3\n1週間後";
print "<br>";
print "$nextweek";
print "<br>";


//課題３
//今日から３か月後の日付
$threeMonthLater=date("Y-m-d",strtotime("3 month"));
print "課題3-1\n３か月後";
print "<br>";
print "$threeMonthLater";
print "<br>";

//今日から何日後
$current  = new DateTime(date("Y-m-d",strtotime("3 month")));
$target   = new DateTime(date('Y-m-d'));
$diff     = $target->diff($current);
$days = $diff->days;

print "課題3-2\n３か月後は何日後？";
print "<br>";
print "$days";

?>
 