// 関数をsetInterval()で処理する
function showTime() {
// 現在の時刻を取得
let now = new Date();
  
// 時、分、秒を取得
let hours = now.getHours();
let minutes = now.getMinutes();
let seconds = now.getSeconds();
  
// 10未満の数値にゼロを付ける（例: 9 → "09"）
if (hours < 10) hours = '0' + hours;
if (minutes < 10) minutes = '0' + minutes;
if (seconds < 10) seconds = '0' + seconds;

// 時間をコンソールに表示
console.log(`${hours}:${minutes}:${seconds}`);
}

// 1秒ごとにshowTime()を実行
setInterval(showTime, 1000);
