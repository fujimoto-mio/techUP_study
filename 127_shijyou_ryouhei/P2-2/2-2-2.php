<?php
$a = 1;
$a = $a + 1;
echo $a;
?>
結果2になります

<?php
$a = 1;
$a += 1;
echo $a;
?>
結果2になります

<?php
$a = 0;
++$a;
echo $a;
++$a;
echo $a;
?>
結果1 その次2になります

<?php
$a = 0;
$a++;
echo $a;
$a++;
echo $a;
?>
結果1 その次2になります

<?php
$a = 5;
$a--;
echo $a;
?>
結果4になります