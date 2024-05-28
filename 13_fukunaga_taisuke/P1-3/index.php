<!DOCTYPE html>
 <html lang="ja">
 <head>
   <meta charset="utf-8">
   <title>php</title>
 </head>
 <body>
 <?php
 // CSVファイルを読み込みモードで開く
 $fp = fopen("member.csv", "r");

 // ファイルを1行ずつ取得する
 //while で回します。
 while ($line = fgetcsv($fp)){

 echo $line[0] . '';
 echo $line[1] . '';
 echo $line[2] . '<br/>';
 }

 // ファイルを閉じる
 fclose($fp);

 ?>
 </body>
 </html>