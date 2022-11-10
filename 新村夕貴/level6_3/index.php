<?php
 

$line = file('member.csv');
// CSVファイルを読み込みモードで開く
$fp = fopen("member.csv", "r");

// ファイルを1行ずつ取得する

//while で回します。
while ($line = fgetcsv($fp)){
	echo $line[$c] . "<br />";
}
 
// ファイルを閉じる
fclose($fp);
 
?>