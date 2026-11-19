
'use strict';

// HTMLから時間を表示する場所を取得
const hoursElement = document.getElementById('hours');
const minutesElement = document.getElementById('minutes');
const secondsElement = document.getElementById('seconds');

// カウントダウンの終了日時を設定
// 月は0から始まるため、0が1月、11が12月
const targetDate = new Date(2027, 0, 1, 0, 0, 0);

// カウントダウンを実行する関数
function updateCountdown() {

    // 現在の日時を取得
    const now = new Date();

    // 終了日時と現在日時の差を計算（ミリ秒）
    const difference = targetDate - now;

    // 残り時間が0以下になった場合
    if (difference <= 0) {

        // すべての表示を0にする
        hoursElement.textContent = '00';
        minutesElement.textContent = '00';
        secondsElement.textContent = '00';

        // タイマーを停止する
        clearInterval(timer);

        return;
    }

    // ミリ秒を秒に変換
    const totalSeconds = Math.floor(difference / 1000);

    // 残り時間を時・分・秒に分ける
    const hours = Math.floor(totalSeconds / 3600);

    const minutes = Math.floor((totalSeconds % 3600) / 60);

    const seconds = totalSeconds % 60;

    // HTMLに残り時間を表示する
    // padStart(2, '0')で1桁の場合は先頭に0を付ける
    hoursElement.textContent = String(hours).padStart(2, '0');
    minutesElement.textContent = String(minutes).padStart(2, '0');
    secondsElement.textContent = String(seconds).padStart(2, '0');
}

// 最初に一度実行する
updateCountdown();

// 1秒ごとにカウントダウンを更新する
const timer = setInterval(updateCountdown, 1000);
