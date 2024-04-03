
    var cnt = 0;

    function event(){
    if(cnt % 2 === 0){
        document.querySelector('h1').textContent='ジャバスクリプト ドム!';
    }else{
        document.querySelector('h1').textContent='JavaScript DOM!';
    }
    
    cnt++;
    if(cnt>100)cnt=0;//オーバーフロー起こさないように
}
    
  /* 1s後に　表示 */
    setInterval(event, 1000);
    
