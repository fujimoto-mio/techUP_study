
<?php
 
// CSVファイルを読み込みモードで開く
$fp = fopen("member.csv", "r");


// ファイルを1行ずつ取得する
while($line = fgetcsv($fp)) {
   
    echo "$line[0]" ;
    echo "$line[1]" ;
    echo "$line[2]" ;
    echo "<br />" ;

    }

// ファイルを閉じる
 
fclose($fp);

?>