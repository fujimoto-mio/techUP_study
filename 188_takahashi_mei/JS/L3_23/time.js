//HTMLから要素を取得 
const daysEl = document.getElementById('days');
const hoursEl = document.getElementById('hours');
const minutesEl = document.getElementById('minutes');
const secondsEl = document.getElementById('seconds');
const yearEl = document.getElementById('year');
const messageEl = document.getElementById('message');

// クリスマスの日時をつくる関数
function christmasDate(year) {
    // 12月25日 0時0分0秒のDateオブジェクトを返す。
    // JSの仕様で12月を指定するなら11をいれる必要があり。
    return new Date(year, 11, 25, 0, 0, 0);
}

// カウント対象（次のクリスマスを取得）
function pickTarget() {
    // 今の日時を取得
    const now = new Date();
    // 現在の年を取得
    const thisYearXmas = christmasDate(now.getFullYear());
    // (条件分岐)もし現在時刻が今年のクリスマスより前なら今年のクリスマスをターゲットにする。
    if (now <= thisYearXmas)
        return thisYearXmas;
    // すでにすぎていたら来年のクリスマスをターゲットに
    return christmasDate(now.getFullYear() + 1);
}

// 今年か来年、どちらのクリスマスをカウントするか決定して target に入れる
let target = pickTarget();
// そのターゲットの年をHTMLに反映
yearEl.textContent = target.getFullYear();
// 2桁表示用のフォーマット関数
function pad(n) {
    // 1桁のとき先頭に0をつける
    return String(n).padStart(2, '0');
}

// カウントダウン更新処理
function updateCountdown() {
    const now = new Date();
    // クリスマスの日から今の日時をひいてカウントする(残り時間)
    const diff = target - now;
    // もし、引いた日時が０になったとき
    if (diff <= 0) {
        // すべて０にしてメッセージを表示するようにする。
        daysEl.textContent = '0';
        hoursEl.textContent = '00';
        minutesEl.textContent = '00';
        secondsEl.textContent = '00';
        messageEl.textContent = '🎄 Happy Merry Christmas! 🎄';
        return;
    }
    // 秒単位に変換
    const sec = Math.floor(diff / 1000);
    const s = sec % 60;
    const m = Math.floor(sec / 60) % 60;
    const h = Math.floor(sec / 3600) % 24;
    const d = Math.floor(sec / 86400);
    // HTMLへ反映
    daysEl.textContent = d;
    hoursEl.textContent = pad(h);
    minutesEl.textContent = pad(m);
    secondsEl.textContent = pad(s);
    messageEl.textContent = `あと ${d}日 ${pad(h)}時間 ${pad(m)}分 ${pad(s)}秒`;
}

updateCountdown();
// １秒ごとに更新
setInterval(updateCountdown, 1000);

// 雪アニメーションの生成
document.addEventListener('DOMContentLoaded', () => {
    const snowContainer = document.querySelector('.snow-container');
    const numberOfSnowflakes = 80; // 雪の粒の数

    // 雪の粒を１つ生成する関数
    function createSnowflake() {
        const snowflake = document.createElement('div');
        snowflake.classList.add('snowflake');

        // ランダムなサイズと位置、アニメーション速度を設定
        const size = Math.random() * 8 + 2; // 2pxから10px
        snowflake.style.width = `${size}px`;
        snowflake.style.height = `${size}px`;
        snowflake.style.left = `${Math.random() * 100}vw`;
        snowflake.style.animationDuration = `${Math.random() * 20 + 10}s`; // おちる速度10秒から30秒
        // 要素を追加
        snowContainer.appendChild(snowflake);

        // 画面外に消えたら削除して再生成
        snowflake.addEventListener('animationend', () => {
            snowflake.remove();
            createSnowflake();
        });
    }

    // 指定した数の雪を生成
    for (let i = 0; i < numberOfSnowflakes; i++) {
        createSnowflake();
    }
});
