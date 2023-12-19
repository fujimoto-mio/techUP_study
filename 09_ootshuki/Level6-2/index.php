<?php 

	$now = time() ;
	echo "今は".date("Y/m/d H:i:s", $now)."です。</br>" ;

	$yesterday = strtotime("-1 day") ;
	echo "昨日は".date("Y/m/d", $yesterday)."です。</br>" ;

	$tomorrow = strtotime("+1 day") ;
	echo "明日は".date("Y/m/d", $tomorrow)."です。</br>" ;

	$nextweek = strtotime("+1 week") ;
	echo "来週は".date("Y/m/d", $nextweek)."です。</br>" ;
	

	$three_month = strtotime("+3 month") ;
	$date_threemonth = date("Y-m-d",$three_month);
	echo "3カ月後は".date("Y/m/d", $three_month)."です。</br>" ;

	date_default_timezone_set('Asia/Tokyo');

	$today = new DateTime("now");
	$day = new DateTime($date_threemonth);
	$diff = $day -> diff($today);
	echo $diff -> format("あと%a日です。");
	