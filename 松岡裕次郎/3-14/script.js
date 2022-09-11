function clock() {
var time = new Date();
var hours = time.getHours()
var minutes = time.getMinutes();
var seconds = time.getSeconds();
console.log(hours+"時"+minutes+"分"+seconds+"秒");
}
setInterval(clock, 1000);
