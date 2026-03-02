// DOMの読み込みが完了してから実行
document.addEventListener('DOMContentLoaded', function () {
  // タイマー表示エリアとボタンの要素を取得
  const timerEl = document.getElementById('timer');
  const forceEndBtn = document.getElementById('btn');

  // 現在の日付と時間を取得
  const now = new Date();
  let year = now.getFullYear();

  // ※JavaScriptの月は0から始まるようので、8月 = 7
  let targetDate = new Date(year, 7, 29, 0, 0, 0);

  // もし今年の誕生日がすでに過ぎていたら、来年の誕生日に設定
  if (targetDate - now <= 0) {
    targetDate = new Date(year + 1, 7, 29, 0, 0, 0);
  }

  // カウントダウンを更新する関数
  function updateCountdown() {
    const currentTime = new Date(); // 現在時刻を再取得
    let diff = targetDate - currentTime; // 誕生日までの残り時間（ミリ秒で計算）

    // 残り時間が0以下になったらタイマー停止＆祝福表示
    if (diff <= 0) {
      clearInterval(intervalId);
      timerEl.textContent = '誕生日おめでとう～～！！🎉';
      showCelebration(); // 紙吹雪アニメーションを実行！
      return;
    }

    // 残り時間を秒に変換
    const totalSeconds = Math.floor(diff / 1000);

    // （秒 → 日）、おおよその月数、残り日数を計算
    const totalDays = Math.floor(totalSeconds / (60 * 60 * 24));
    const months = Math.floor(totalDays / 30);  // おおよそで計算（30日を1ヶ月として）
    const days = totalDays % 30;                // 残り日数

    // 残り分・秒を算出
    const minutes = Math.floor((totalSeconds % (60 * 60)) / 60);
    const seconds = totalSeconds % 60;

    // タイマー表示を更新
    timerEl.textContent = `あと${months}ヶ月${days}日${minutes}分${seconds}秒です。`;
  }

  // setIntervalで1秒ごとにカウントダウンを更新
  const intervalId = setInterval(updateCountdown, 1000);
  
  updateCountdown(); // 初回呼び出しで即時更新

  // ボタンが押された時の処理
  forceEndBtn.addEventListener('click', showCelebration);

  // 紙吹雪とおめでとうメッセージを表示する関数
  function showCelebration() {
    clearInterval(intervalId); // タイマーを停止
    timerEl.textContent = '8月29日！誕生日おめでとう！🎉';

    // 紙吹雪を表示（canvas-confettiを使用※ネットで検索したもの）
    confetti({
      particleCount: 150,  // 紙吹雪の数
      spread: 100,         // 広がり具合
      origin: { y: 0.6 }   // 画面の下の方から表示
    });
  }
});
