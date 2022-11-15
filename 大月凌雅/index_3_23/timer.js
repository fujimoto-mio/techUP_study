function set(num) {
    var ret;
    if( num < 10 ) { ret = "0" + num; }
    else { ret = num; }
    return ret;
}
function timer() {
    var nowTime = new Date();
    var nowHour = set( nowTime.getHours() );
    var nowMin  = set( nowTime.getMinutes() );
    var nowSec  = set( nowTime.getSeconds() );
    var msg = nowHour + ":" + nowMin + ":" + nowSec;
    document.getElementById("timer").textContent = msg;
}
setInterval("timer()",1000);

var img = document.createElement("img");
img.src = "https://spice.eplus.jp/images/QtAwKk9lIVJvNhKocwHW8FJBVEdnvYzyL8f3uxTc0KTDIk0LqG8RncUB3A0f4MBX";
var imgDisplay = document.getElementById("timer2");

function timer2() {
    var nowTime = new Date();
    var nowSec  = nowTime.getSeconds();
    var msg2 = "00" + ":" + "00" + ":" + (60 - nowSec);
    document.getElementById("timer2").innerHTML = msg2;

    if (msg2 == "00:00:60") {
        document.getElementById("timer2").textContent = "TIME OVER"
        clearInterval(over);
        imgDisplay.appendChild(img);
    }
}
var over = setInterval("timer2()",1000);