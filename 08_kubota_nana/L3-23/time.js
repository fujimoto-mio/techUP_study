const hour = document.getElementById("hour");
const min = document.getElementById("min");
const sec = document.getElementById("sec");

function countdown() {
  const now = new Date(); // 現在時刻を取得
  const tomorrow = new Date(now.getFullYear(),now.getMonth(),now.getDate()+1); // 明日の0:00を取得
  const diff = tomorrow.getTime() - now.getTime(); // 時間の差を取得（ミリ秒）

  // ミリ秒から単位を修正
  const calcHour = Math.floor(diff / 1000 / 60 / 60);
  const calcMin = Math.floor(diff / 1000 / 60) % 60;
  const calcSec = Math.floor(diff / 1000) % 60;

  // 取得した時間を表示（2桁表示）
  hour.innerHTML = calcHour < 10 ? '0' + calcHour : calcHour;
  min.innerHTML = calcMin < 10 ? '0' + calcMin : calcMin;
  sec.innerHTML = calcSec < 10 ? '0' + calcSec : calcSec;
}
countdown();
setInterval(countdown,1000);