console.log(Math.random());
 
//ランダムな整数値を５個ならべます。
for (let i = 0 ; i < 6 ; i++){
  let num = Math.floor(Math.random() * 6+1);
  console.log(num);
}

"use strict";
2
3
4  const one = Math.floor(Math.random() * 6) + 1;


document.getElementById("saikoro").addEventListener("click", () => {
    2  ver dic = Math.floor(Math.random() * 6) + 1;
    3  document.getElementById("sainome").textContent = one;
    4});


