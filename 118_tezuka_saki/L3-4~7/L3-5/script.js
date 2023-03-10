'use strict';
//いろいろな計算方法、暗黙の数値変換
console.log('1' + 2);
console.log('1' + '2');
console.log("1" + "2");
console.log(2 + '1');
console.log(2 + 2 + '1');
console.log(6 - '2');
console.log(1 + 2);
console.log(6 - "2");

let a, b, c;
a = b = c = 2 + 2;
console.log(a);
console.log(b);
console.log(c);

let n = 2;
n = n + 5;
console.log(n);
n = n * 2;
console.log(n,'最終結果!');

let m = 2;
m += 5;
console.log(m);
m *= 2;
console.log(m,'結果はあっていますか？');

// インクリメント/デクリメントについて
let counter = 2;
counter++;
console.log(counter);

let counter2 = 2;
++counter2;
console.log(counter2);

let counter3 = 2;
counter3--;
console.log(counter3);

let counter4 = 2;
--counter4;
console.log(counter4);