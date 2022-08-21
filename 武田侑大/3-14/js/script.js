setInterval(function showClock() {
  let nowTime = new Date();
  let nowHour = nowTime.getHours() ;
  let nowMin  = nowTime.getMinutes() ;
  let nowSec  = nowTime.getSeconds() ;
console.log(nowHour + "時",nowMin + "分",nowSec + "秒");
},1000)
