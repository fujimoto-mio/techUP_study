// ターゲットとなる日付
const targetDate = new Date("January 1, 2024 00:00:00").getTime();

// タイマーを更新する関数
const updateTimer = () => {
    const now = new Date().getTime();
    const distance = targetDate - now;
    // カウントダウン終了時
    if (distance <= 0) {
        document.getElementById("timer").innerHTML = "カウントダウン終了";
        return;
    }
    // 日数
    const days = Math.floor(distance / (1000 * 60 * 60 * 24));
    // 時間
    const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    // 分数
    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    // 秒数
    const seconds = Math.floor((distance % (1000 * 60)) / 1000);

    document.getElementById("timer").innerHTML = `2024年元旦まであと ${days}日 ${hours}時間 ${minutes}分 ${seconds}秒`;

    // 1秒ごとにタイマーを更新
    setTimeout(updateTimer, 1000);
};

// 初回表示
updateTimer();
