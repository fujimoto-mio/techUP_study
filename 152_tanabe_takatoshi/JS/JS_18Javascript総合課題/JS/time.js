function updateTimer(display) {  //カウントダウン関数
  //時間変数
  let now = new Date(); //現在の時間
  let tomorrow = new Date(now.getFullYear(),now.getMonth(),now.getDate()+1); //明日の日時（now + 1）
  let remainingSeconds = Math.floor((tomorrow - now) / 1000); //現在の時刻から明日の同じ時刻までの残り秒数

  if (remainingSeconds <= 0) {
    let nextDay = new Date(now.getFullYear(), now.getMonth(), now.getDate() + 1); //翌日の日付を設定
    let dayAfterNext = new Date(now.getFullYear(), now.getMonth(), now.getDate() + 2); //翌々日の日付を設定
    remainingSeconds = Math.floor((dayAfterNext - nextDay) / 1000); //翌日の同じ時刻から明後日の同じ時刻までの残り秒数
}

let hours = Math.floor(remainingSeconds / 3600); //残りの秒数を3600で割る
let minutes = Math.floor((remainingSeconds % 3600) / 60); //残りの秒数を3600で割り余りを60でわる
let seconds = remainingSeconds % 60; //残りの秒数を60で割ったあまり

//1桁の場合、それぞれの数字の前に "0" を追加して、2桁の数字にする
hours = hours < 10 ? "0" + hours : hours;
minutes = minutes < 10 ? "0" + minutes : minutes;
seconds = seconds < 10 ? "0" + seconds : seconds;

display.textContent = hours + ":" + minutes + ":" + seconds;
}

window.onload = function () {
  let display = document.getElementById('timer');
  updateTimer(display); //display 変数に代入
  setInterval(function() {
      updateTimer(display); //タイマーを初期化
  }, 1000); //1秒ごとに更新
};