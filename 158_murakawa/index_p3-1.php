<?php

$array = [1, 1, 2, 3, 3, 3, 3, 4, 4, 4, 5];

$nums = $array;

function countNumbers($nums) {
    $counter = [];

    foreach ($nums as $num) {
        if (!array_key_exists($num, $counter)) {
            $counter[$num] = 0;
        }
        $counter[$num] += 1;
    }

    foreach ($counter as $key => $value) {
        echo $key . "が" . $value . "つ\n". '<br/>';
    }
}

countNumbers($nums);
?>