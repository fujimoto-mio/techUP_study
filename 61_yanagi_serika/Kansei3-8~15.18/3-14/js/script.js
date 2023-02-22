window.onload = function () {
 
  function event() {
      // 1000ミリ秒ごとに表示
      document.write(" テスト表示 ");

  }
  // 処理間隔の単位はミリ秒 タイマー開始
  timer = setInterval(event, 1000);
}
const xmas95 = new Date('December 25, 1995 23:15:30');
const seconds = xmas95.getSeconds();

console.log(seconds); // 30