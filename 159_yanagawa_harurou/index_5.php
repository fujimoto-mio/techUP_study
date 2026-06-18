<?php

function singleNumber($nums){
    $ret = [];
    $counter = [];

    foreach($nums as $num){
        if(!array_key_exists($num,$counter)){
            $counter[$num] = 0;
        }
        $counter[$num]++;
    }
    foreach($counter as $num => $count){
        if($count === 2){
            $ret[] = $num;
        }
    }
    return $ret;
}

$array = [1, 2, 3, 1, 4, 4, 6, 5, 5, 5, 5];
$result = singleNumber($array);

echo "２回格納されている数は<br>";
foreach($result as $value){
    echo $value."<br>";
}

echo "です。";

?>