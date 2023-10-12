<?php
 
// CSVファイルを読み込みモードで開く
$fp = fopen("member.csv", "r");
 
// ファイルを1行ずつ取得する
while (($line = fgetcsv($fp)) !== false) {
    // 配列を繰り返す
    foreach ($line as $data) {
        // 出力されたデータを表示する
        echo $data . " ";
    }
    echo "<br />";
}
 
// ファイルを閉じる
fclose($fp);
 
?>

