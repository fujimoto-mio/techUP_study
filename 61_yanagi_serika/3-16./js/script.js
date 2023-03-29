var cnt = 0;
 /* タグ内の表を変える */
  function event(){
    if(cnt % 2 === 0){
      /* 配列のpタグの2番めのタグ[1]の要素を取得 */
      document.querySelectorAll('p')[1].textContent='2 Change JavaScript';
      
　　　/* 配列の要素を１度ずつ実行 */
      document.querySelectorAll('div').forEach((div,index)=>{
        div.textContent = `${index}番目　JavaScript test`;
      });
 
    }else{
      document.querySelectorAll('p')[1].textContent='2 変更 ジャバスクリプト';
      //
      document.querySelectorAll('div').forEach((div,index)=>{
        div.textContent = `${index}番目　ジャバスクリプト テスト`;
      });
 
    }
 
    cnt++;
    if(cnt>100)cnt=0;//オーバーフロー起こさないように
 
  }
  /* 1s後に　表示 */
  setInterval(event, 1000);


  