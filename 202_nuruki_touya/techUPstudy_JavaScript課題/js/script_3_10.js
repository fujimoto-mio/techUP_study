const names = ["山田さん", "佐藤さん", "内田さん"];

console.log("最初に配列の値を表示します。");
for (let i = 0; i < names.length; i++) {
  console.log(names[i]);
}

while (names.length > 0) {
  const deletename = names.shift();
  console.log("配列の値を1つ消します。");
  console.log(deletename + "を消しました");
  
  if (names.length !== 0) {
    console.log("残りを表示します。");
    for (let i = 0; i < names.length; i++) {
      console.log(names[i]);
    }
  } else {
    console.log("データがなくなりました。");
  }
}