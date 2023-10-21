<?php
$input = array(1,2,3,1,4,4,6,5,5,5);
$output = array_count_values($input);
echo("2回格納されている数は");
echo '<br>';

foreach($output as $a => $b){
    if($b == 2){
        print $a;
         echo'<br>' ;
    }
}
echo("です。");

?>