setInterval(function showClock() {
	var nowTime = new Date();
	var nowHour = nowTime.getHours();
	var nowMin  = nowTime.getMinutes();
	var nowSec  = nowTime.getSeconds();
	var msg = "現在時刻は、" + nowHour + ":" + nowMin + ":" + nowSec + " です。";
    console.log(msg);
},1000)