alert("xxを関数で確認します");　/* ① */
 
function checkvalue1(value) {
    if (value >= 4) {
        console.log("値は4以上です。");
    } else {
        console.log("値は4未満です。");
    }
}

// 2つ目の関数（値が10以上かどうか判定）
function checkvalue2(value) {
    if (value >= 10) {
        console.log("値は10以上です。");
    } else {
        console.log("値は10未満です。");
    }
}

// 数値5を入力して関数を実行
checkvalue1(5);
checkvalue2(5);