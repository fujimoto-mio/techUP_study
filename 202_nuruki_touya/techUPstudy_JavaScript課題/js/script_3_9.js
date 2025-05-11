const numbers = [1,2,3,4,5,6,7,8,9,10];

// 繰り返し処理を行う関数
function looparray(array) {
    for (let i = 0; i < array.length; i++) {
        console.log(array[i]); // 配列の要素を順番に表示
    }
}

// 関数を実行
looparray(numbers);