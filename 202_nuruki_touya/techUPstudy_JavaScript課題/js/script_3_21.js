// Canvas要素を取得
var canvas = document.getElementById('myCanvas');
var ctx    = canvas.getContext('2d');

//　画像を定義
var image    = new Image();
var imageUrl = "https://techup.tokyo/wp-content/uploads/2022/05/gosticon.png";

// 画像がロードされた後にアニメーション開始
image.onload = function() {
  // Canvasのサイズ設定
  canvas.width  = 1000;
  canvas.height = 1000;

  // 中心点の設定
  var centerX = canvas.width  / 4;
  var centerY = canvas.height / 4;

  // 半径（円運動の大きさ）
  var radius = 200;

  // 初期角度
  var angle = 0;

  // 画像サイズを調整するとこ（画像がめちゃくちゃデカく表示されたので2分の1→4分の1まで調整しました）
  var imgW = image.width  / 4;
  var imgH = image.height / 4;

  // アニメーション関数
  function animate() {
    // 画面クリア
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    // 円周上の座標を計算
    var x = centerX + Math.cos(angle) * radius;
    var y = centerY + Math.sin(angle) * radius;

    // 画像のサイズを調整して描画するとこ
    ctx.drawImage(
      image,
      x - imgW / 4, 
      y - imgH / 4,  
      imgW,          
      imgH           
    );

    // 回る速度　0.05だと目が回りそうでしたので調整しました！！！
    angle += 0.01;

    // アニメーションをループ
    requestAnimationFrame(animate);
  }

  // アニメーション開始
  animate();
};

// 画像の読み込みを開始
image.src = imageUrl;
