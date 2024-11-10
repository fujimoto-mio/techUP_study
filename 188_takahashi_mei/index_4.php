<?php
$array = [1,2,3,1,3,3,3,4,4,4,5];
$nums = $array;

function countValues($nums)
{
   $counts = []; 
   foreach ($nums as $num){
    
      if (!array_key_exists($num, $counts)) {
         $counts[$num] = 0;
      }
         $counts[$num]+= 1;
   }
   return $counts;
}

$res = countValues($nums);

foreach($res as $num => $count) {
       echo "$num が  $count つ<br>";
}
?>







