'use strict';

//全てのliを取り出して繰り返し数値に変換して、引数に入れた数値を掛けたnewValueをtextContentで代入する
const changeList = (rate) =>  {
  const listItems = document.querySelectorAll("li");

  listItems.forEach(item => {
    const currentValue = parseInt(item.textContent);
    const newValue = currentValue * rate;
    item.textContent = newValue;
  });
}


// 変更ボタン、引数に10を入れて10倍させる
let c = document.querySelector("#changebtn");
c.addEventListener('click', () => changeList(10));

// リセットボタン、引数に0.1を入れて0.1倍させる
let d = document.querySelector("#resetbtn");
d.addEventListener('click', () => changeList(0.1));




/*引数を取らずに処理する場合、変更ボタンでchangeList()を実行
 const changeList = () => {
  const listItems = document.querySelectorAll("li");

  listItems.forEach(item => {
    const currentValue = parseInt(item.textContent);
    const newValue = currentValue * 10;
    item.textContent = newValue;
  });
}

let e = document.querySelector("#changebtn");
e.addEventListener("click", () => changeList);

/*引数を取らずに処理する場合、リセットボタンでbackList()を実行
 const backList = () => {
  const listItems = document.querySelectorAll("li");

  listItems.forEach(item => {
    const currentValue = parseInt(item.textContent);
    const newValue = currentValue / 10;
    item.textContent = newValue;
  });
}

let c = document.querySelector("#resetbtn");
c.addEventListener("click", () => backList);*/



