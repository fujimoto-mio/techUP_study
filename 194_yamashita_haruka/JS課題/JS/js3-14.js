function showDigitalClock() {
  const now = new Date();//何日
  const hours = now.getHours();//何時
  const minutes = now.getMinutes();//何分
  const seconds = now.getSeconds();//何秒

  // 1桁の数字を2桁表示にするための処理toString()で文字列にする、二桁になるまで前に0をつける
  const formattedHours = hours.toString().padStart(2, '0');
  const formattedMinutes = minutes.toString().padStart(2, '0');
  const formattedSeconds = seconds.toString().padStart(2, '0');

  const timeString = `${formattedHours}:${formattedMinutes}:${formattedSeconds}`;
  console.log(timeString);
}

// 1秒ごとにshowDigitalClockを実行
setInterval(showDigitalClock, 1000);