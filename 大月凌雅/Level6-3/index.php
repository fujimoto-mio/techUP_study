<?php

$fp = fopen("member.csv", "r");
 
while ($line = fgets($fp)){
    echo $line . "<br />";
}
 
fclose($fp);
 
?>