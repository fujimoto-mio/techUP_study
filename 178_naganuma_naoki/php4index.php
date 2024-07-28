<?php

$array = [1, 2, 3, 1, 3, 3, 3, 4, 4, 4, 5];

/* 関数を定義します。*/
function singleNumber($array){
    // 出現回数をカウントするための配列を初期化します。
    $counter = array();

    // 配列の各要素をループ処理して、出現回数をカウントします。
    foreach($array as $num){
        if(!array_key_exists($num, $counter)){
            $counter[$num] = 1;
        } else {
            $counter[$num]++;
        }
    }

    // 結果を出力します。
    foreach($counter as $key => $value){
        echo "$key が $value つ<br>";
    }
}

// 関数を呼び出して、配列内の数字の出現回数を表示します。
singleNumber($array);

?>
