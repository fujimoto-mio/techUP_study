<?php
 
// CSVファイルを読み込みモードで開く
$fp = fopen("member.csv", "r");

// ファイルを1行ずつ取得する
//while で回します。
while ($line = fgetcsv($fp)){
// 配列を繰り返す

//出力されたデータを表示する
// $Cは、行数
echo $line[0] . "<br />";
echo $line[1] . "<br />";
echo $line[2] . "<br />";

}
 
// ファイルを閉じる
fclose($fp);
 
?>