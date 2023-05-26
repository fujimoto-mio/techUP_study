<?php
 
$fp = fopen("member.csv", "r");

while ($line = fgetcsv($fp)){
    
echo $line[0] . "<br />";
echo $line[1];
echo $line[2] . "<br />";
}
 
fclose($fp);
 
?>