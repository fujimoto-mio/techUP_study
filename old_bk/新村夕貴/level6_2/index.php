
<?php

//現在の日付と時間
$d=date("Y-m-d H:i:s");
printf("現在、%sです。".'<br/>',$d);

//明日
$today=date("Y年m月d日");
$tomorrow=date("Y年m月d日",strtotime("+1 day"));

//昨日
$today=date("Y年m月d日");
$yesterday=date("Y年m月d日",strtotime("-1 day"));

//一週間後
$today=date("Y年m月d日");
$oneweek_later=date("Y年m月d日",strtotime("+1 week"));

printf( "明日は%sです。".'<br/>', $tomorrow);
printf( "昨日は%sです。".'<br/>', $yesterday);
printf( "一週間後は%sです。".'<br/>', $oneweek_later);
 
//三ヶ月後
$today=date("Y年m月d日");
$today_threemonth=date("Y-m-d",strtotime('+3 month',strtotime($today)));
printf( "%sの三ヶ月後は、%sです。".'<br/>',$today, $today_threemonth);

//現在から三ヶ月後の日数
$three_month_date=date('t', strtotime('+3 month'));
printf( "三ヶ月後までの日数は、".$three_month_date."日です。");

?>