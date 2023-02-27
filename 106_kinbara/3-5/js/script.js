let a = 1+10;
let b = 1-10;
let c = 10.5 * 20; 
let d = 10 / 20;
let e = 10 % 20;  /* 余り表示 */
let f = 3**4;     /* べき乗(3*3*3*3) */
 
console.log(a);
console.log(b);
console.log(c);
console.log(d);
console.log(e);
console.log(f);

let x = 0;
x++;　/*単項演算子 ← x = x + 1  と同じ意味*/
console.log(x);
 
let y = 1;
y += y;　/*単項演算子 ← y = y + y  と同じ意味*/
console.log(y);

let counter = 2;
counter++;  // counter = counter + 1 と同じです インクリメント
console.log( counter ); // 3
 
let counter2 = 2;
++counter2;  // counter2 = counter2 + 1 と同じです インクリメント
console.log( counter2 ); // 3
 
let counter3 = 2;
counter3--;   // counter3 = counter3 - 1 と同じで　デクリメント
console.log( counter3 ); // 1
let counter4 = 2;
--counter4;   // counter4 = counter4 - 1 と同じで　デクリメント
console.log( counter4 ); // 1
