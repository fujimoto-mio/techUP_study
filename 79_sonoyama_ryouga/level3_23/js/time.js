function countdown() {
    const now = new Date();//現在の時刻
    const tomorrow = new Date(now.getFullYear(), now.getMonth(), now.getDate() + 1);//翌日の0時
    const differ = tomorrow.getTime() - now.getTime();//残り時間の計算


    const sec = Math.floor(differ / 1000) % 60;//ミリ秒を秒に計算
    const min = Math.floor(differ / 1000 / 60) % 60;//ミリ秒を分に計算
    const hour = Math.floor(differ / 1000 / 60 / 60);//ミリ秒を時に計算


    document.getElementById("hour").textContent = String(hour).padStart(2, "0"); //数値が一桁の際0を表示
    document.getElementById("min").textContent = String(min).padStart(2, "0");
    document.getElementById("sec").textContent = String(sec).padStart(2, "0");
    setTimeout(countdown, 1000);//1秒ループ
}
countdown();