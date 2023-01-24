
// タイマーの日付を設定
var countDownDate = new Date("Jan 1, 2024 00:00:00").getTime();
// 1秒おきに更新
var x = setInterval(function() {
  // 今日の日付と時間を取得
  var now = new Date().getTime();

  // 日付と時間の計算
  var distance = countDownDate - now;
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
  // 出力する内容
  document.getElementById("countTimer").innerHTML = days + "<span>日</span>" + hours + "<span>時</span>"
  + minutes + "<span>分</span>" + seconds + "<span>秒</span>";

  // タイマー終了後
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("countTimer").innerHTML = "タイマーが終わったよ。";
  }
}, 1000);