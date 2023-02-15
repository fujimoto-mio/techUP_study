<?php
// csvファイルを開いて、読み込みモードに設定する
$fp = fopen('./test.csv', 'r');
 
// テーブルタグを作成し、テーブルヘッダーで見出しを作る
echo '<table border="1">
      <tr>
      <th>ID</th>
      <th>名前</th>
      <th>年齢</th>
      </tr>';
 
// while文でCSVファイルのデータを1つずつ繰り返し読み込む
while($data = fgetcsv($fp)){
 
  // テーブルセルに配列の値を格納
  echo '<tr>';
  echo '<td>'.$data[0].'</td>';
  echo '<td>'.$data[1].'</td>';
  echo '<td>'.$data[2].'</td>';
  echo '</tr>';
}
 
// テーブルの閉じタグ
echo '</table>';
 
// 開いたファイルを閉じる
fclose($fp);
?>