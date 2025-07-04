
let names = ["山田さん", "佐藤さん", "内田さん"];

// 初期状態の表示
console.log("最初に配列の値を表示します。");
for (let i = 0; i < names.length; i++) {
  console.log(names[i]);
}

// shift()で先頭から消していくnames.length =3
while (names.length > 0) {
  const name = names.shift();
  console.log("配列の値を1つ消します。");
  console.log(`${name}を削除しました。`);

  // 残りの要素を表示
  console.log("残りを表示します。");
  if (names.length > 0) {
    for (let i = 0; i < names.length; i++) {
      console.log(names[i]);
    }
  } else {
    console.log("データがなくなりました。");
  }
}
/*最初に配列の値を表示します。
山田さん
佐藤さん
内田さん
配列の値を1つ消します。
山田さんを消しました。
残りを表示します。
佐藤さん
内田さん
配列の値を1つ消します。
佐藤さんを消しました。
残りを表示します。
内田さん
配列の値を1つ消します。
内田さんを消しました。
データがなくなりました。*/




