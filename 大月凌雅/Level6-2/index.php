<?php 

	$now = time() ;
	echo date("Y/m/d H:i:s \n", $now) ;

	$yesterday = strtotime("-1 day") ;
	echo "昨日は".date("Y/m/d", $yesterday)."です。\n" ;

	$tomorrow = strtotime("+1 day") ;
	echo "明日は".date("Y/m/d", $tomorrow)."です。\n" ;

	$nextweek = strtotime("+1 week") ;
	echo "来週は".date("Y/m/d", $nextweek)."です。\n" ;
	

	$three_month = strtotime("+3 month") ;
	$date_threemonth = date("Y-m-d",$three_month);
	echo "3カ月後は".date("Y/m/d", $three_month)."です。\n" ;

	date_default_timezone_set('Asia/Tokyo');

	$today = new DateTime("now");
	$day = new DateTime($date_threemonth);
	$diff = $day -> diff($today);
	echo $diff -> format("あと%a日です。");
	