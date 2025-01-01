function getRTansu(n){
  for(let i= 1; i <= 10; i++){//10回繰り返す
    let ransu = Math.floor(Math.random() * n + 1); //6*0.n= 6以下 0は含めないため+1
    console.log(`サイコロの目: ${ransu}`);
  }
}

//getRTansu関数の引数を6にして呼び出し
getRTansu(6);