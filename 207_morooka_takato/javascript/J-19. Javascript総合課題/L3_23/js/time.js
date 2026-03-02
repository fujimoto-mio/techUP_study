const year = document.getElementById('NextYear');
const days = document.getElementById('days');
const hours = document.getElementById('hours');
const minutes = document.getElementById('minutes');
const seconds = document.getElementById('seconds');

//今年の値を取得
const currentYear = new Date().getFullYear();
//来年の値を取得
const nextyear = currentYear + 1;
//来年の1月1日00:00:00のDate取得
const newYearTime = new Date(`01 01 ${nextyear}`)

//来年の年表をDOMに書き込み
year.innerText = nextyear;

function Countdown(){
    //現在の時刻取得
    const currentTime = new Date();
    //現在と来年までの時間の差を取得
    const diff = newYearTime - currentTime;
    
    // 現在から新年までの日数の計算
    const d = Math.floor(diff / 1000 / 60 / 60 / 24);
    // 時間を計算
    const h = Math.floor(diff / 1000 / 60 / 60) % 24;
    // 分を計算
    const m = Math.floor(diff / 1000 / 60) % 60;
    // 秒を計算
    const s = Math.floor(diff / 1000) % 60;

    //DOMに追加　（２桁にする）
    days.innerText = d;
    hours.innerText = h < 10 ? '0' + h : h;
    minutes.innerText = m < 10 ? '0' + m : m;
    seconds.innerText = s < 10 ? '0' + s : s;

    if(h == "00" && m == "00" && s == "00"){
        const happy = document.getElementById("content");
        happy.innerHTML = "<h1 id='happy'> Happy NewYear!!<h1>";
    }

}

Countdown();
//1秒ごとに実行
setInterval(Countdown, 1000);


    
