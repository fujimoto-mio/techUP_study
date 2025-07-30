// 年を表示するための要素を取得
const year = document.getElementById('year');

// 各カウントダウンに必要な要素を取得
const daysEl = document.getElementById('days');
const hoursEl = document.getElementById('hours');
const minutesEl = document.getElementById('minutes');
const secondsEl = document.getElementById('seconds');

// 現在の年を取得
const currentYear = new Date().getFullYear();

// 来年の１月１日０時０分０秒に目標を設定
const targetDate = new Date(`January 1 ${currentYear + 1} 00:00:00`);

// 年表示を更新
year.textContent = currentYear + 1;

// カウントダウン関数
function updateCountdown() {
    // 今の時間の取得
    const now = new Date();
    // 目標までの残り時間
    const diff = targetDate - now;

    // 差が０未満になったら新しい年のカウントに切り替える
    if (diff <= 0) {
        currentYear++;
        targetDate = new Date(`January 1 ${currentYear + 1} 00:00:00`);
        year.textContent = currentYear + 1;
        return;
    }

    // ミリ秒から日・時・分・秒に変換
    const totalSeconds = Math.floor(diff / 1000);
    const d = Math.floor(totalSeconds / 86400);
    const h = Math.floor((totalSeconds % 86400) / 3600);
    const m = Math.floor((totalSeconds % 3600) / 60);
    const s = totalSeconds % 60;

    // htmlに表示
    daysEl.textContent = d;
    hoursEl.textContent = formatZero(h);
    minutesEl.textContent = formatZero(m);
    secondsEl.textContent = formatZero(s);
}

// 一桁の数字を０付きで表示
function formatZero(num) {
    return num < 10 ? '0' + num : num;
}

// 初回実行・１秒ごとに繰り返し実施
updateCountdown();
setInterval(updateCountdown, 1000);