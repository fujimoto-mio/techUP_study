// ul要素を取得
var ul = document.querySelector('.list-group');
 
// ul要素の子要素であるli要素を取得
var listItems = ul.querySelectorAll('.list-group-item');
 
// 初期値を格納する配列を定義
var originalValues = [];
 
// 各li要素の初期値を取得して配列に格納
listItems.forEach(function(li) {            
  originalValues.push(parseInt(li.textContent)); //push()はl3-10でやっているので要復習
}); // parseIntは文字列から整数を解析し、整数を返します。
     // ↑パーサーと呼ばれるものなので、覚えておきましょう。
 
// 変更ボタン
document.getElementById('changeBtn').addEventListener('click', function() {
  // クラス名からliの要素を取得する
  var listItems = document.querySelectorAll('.list-group-item');
  // 要素の長さを取得してfor文(繰り返し処理)でまわす
  for (var i = 0; i < listItems.length; i++) {
    // liの要素の値を取得して10を乗算するロジック
    var value = parseInt(listItems[i].textContent);
    listItems[i].textContent = value * 10;
  }
});
 
// リセットボタン
document.getElementById('resetBtn').addEventListener('click', function() {
  // クラス名からliの要素を取得する
  var listItems = document.querySelectorAll('.list-group-item');
  // 手順1で作成した初期の値が入った配列を読み込んで、各要素に返すロジックを作成
  listItems.forEach(function(item, index) {　
    item.textContent = originalValues[index];
  });
});
