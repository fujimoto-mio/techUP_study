<?php 

/**
 * 引数で渡された配列に2回出てきた値を取得し、配列に入れて返します。
 */
function singleNumber($nums)
{
    $ret = []; // 2回出てきた値を入れる配列
    /**
     * 値が何回出てきたかをカウントする連想配列
     * $counterの中身は以下のようなデータが入ります
     * $counter = [
     *     '1'=>2,
     *     '2'=>1,
     *     '3'=>1,
     *     '4'=>2,
     *     '5'=>4,
     *     '6'=>1
     * ]
     */
    $counter = [];

    foreach($nums as $num) {
        // TODO1 array_key_exists関数を使って$counterにデータを入れます
            if(!array_key_exists($num, $counter)){
                $counter[$num] = 1; // TODO1続き $counterにキーが$numのデータがない場合は$counter[$num]に0を代入してください
            } else {
                $counter[$num]++; // TODO2 $counter[$num]に1を加算してください（カウント処理）
            }
        }

    foreach($counter as $num => $count) {
        // TODO3 出てきた回数が2回の場合、キーを$retに追加してください2
        if($count == 2){
            $ret[] = $num;
        }
    }
    if(empty($ret)) {
        return '2回出現する値はありませんでした';
    }
 
    return implode("<br>",$ret);
}
 
$array = [1, 2, 3, 1, 4, 4, 6, 5, 5, 5, 5];
$result = singleNumber($array);

echo '2回格納されている数は'."<br>". $result."<br>". 'です。'; 
//実行結果のように表示されるように、2回出た値が格納している$result配列を
//全て出力できるようにしてください
?>
