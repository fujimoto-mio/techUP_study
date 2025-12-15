<?php

$array = [1, 2, 3, 1, 3, 3, 3, 4, 4, 4, 5];
$nums = array_count_values($array);

foreach ($nums as $num => $a) {
    echo $num."が".$a."つ<br>";
}

?>
