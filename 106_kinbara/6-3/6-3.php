
<?php
 
// CSVファイルを読み込みモードで開く
$fp = fopen("member.csv", "r");
 
// ファイルを1行ずつ取得する
while($line = fgetcsv($fp)) {
   
    for ($i=0;$i<count($line);$i++) {
        echo "<td>" . $line[$i] . "</td>";
    }
}
// ファイルを閉じる
 
fclose($fp);

?>