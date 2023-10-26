const days = document.getElementById("days");
const hour = document.getElementById("hour");
const min = document.getElementById("min");
const sec = document.getElementById("sec");

function countdown() {
  const now = new Date(); // 現在時刻を取得
  const birthday = new Date("Feb 12, 2023 00:00:00"); // 誕生日2023年2月12日0時0分を取得
  const diff = birthday.getTime() - now.getTime(); // 時間の差を取得（ミリ秒）

  // ミリ秒から単位を修正
  const calcDays = Math.floor(diff / (1000 * 60 * 60 * 24));//日数計算
  const calcHour = Math.floor(diff / 1000 / 60 / 60);//時間計算
  const calcMin = Math.floor(diff / 1000 / 60) % 60;//分計算
  const calcSec = Math.floor(diff / 1000) % 60;//秒計算

  // 取得した時間を表示（2桁表示）
  days.innerHTML = calcDays < 10 ? '0' + calcDays : calcDays;
  hour.innerHTML = calcHour < 10 ? '0' + calcHour : calcHour;
  min.innerHTML = calcMin < 10 ? '0' + calcMin : calcMin;
  sec.innerHTML = calcSec < 10 ? '0' + calcSec : calcSec;
}
countdown();
setInterval(countdown,1000);