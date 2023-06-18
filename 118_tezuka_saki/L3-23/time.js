'use strict';
let timer = setInterval(function(){
    const now = new Date(); //今日の日付取得
    const limit = new Date("2023/4/28 23:59"); //目標の日付取得
    const countDown =limit - now; //差分日時計算

    //各時間取得
    const day = Math.floor(countDown / 1000 / 60 / 60 / 24);
    const houre = Math.floor(countDown / 1000 / 60 / 60) % 24;
    const min = Math.floor(countDown / 1000 / 60) % 60;
    const sec = Math.floor(countDown / 1000) % 60;

    //取得した時間に書き変え
    document.getElementById('day').textContent=day;
    document.getElementById('houre').textContent=houre;
    document.getElementById('min').textContent=min;
    document.getElementById('sec').textContent=sec;
    
    //指定の日時になったらカウントを停止
    if(countDown < 0){
        clearInterval(timer);
    }
},1)