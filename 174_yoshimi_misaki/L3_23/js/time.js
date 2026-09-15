//HTMLのtimer要素取得
var timer = document.getElementById('timer');

//カウントダウン終了地点(ゴール)
var targetDate = new Date('2026-09-30 00:00:00');

setInterval(function() {

//現在時刻取得
var now = new Date();
//ゴールまでの残り時間
var diff = targetDate - now;

//残り時間から「時間」を計算
var hours = Math.floor(diff / 1000 / 60 / 60);
//残り時間から「分」を計算
var minutes = Math.floor(diff / 1000 / 60) % 60;
//残り時間から「秒」を計算
var seconds = Math.floor(diff / 1000) % 60;

//計算した時間をHTMLに表示
timer.textContent = hours + '時間' + minutes + '分' + seconds + '秒';

}, 1000);