<?php

// 条件

$value1 = 200;
$value2 = 100;

if ($value1 > $value2) {
  echo 'value1はvalue2より大きい';
} else {
  echo 'value1はvalue2より小さい';
}

// 条件分岐

$text = 'man';
if ($text === 'man') {
  echo '男性';
} elseif ($$text === 'woman') {
  echo '女性';
};

$text1 = 'success';
if ($text1 === 'success') :
?>

<p>テスト結果は合格です。処理は正常に行われています。</p>
<?php elseif ($text1 === 'error') : ?>
<p>テストの結果は失敗です。処理中にエラーが発生しています。</p>
<?php endif; ?>


<?php

$is_active = true;
$result = $is_active == true ? "active" : 'default';
echo $result;

$week = 'wednesday';

switch ($week) {
  case 'monday':
    echo '月曜日';
    break;
  case 'tuesday':
    echo '火曜日';
    break;
  case 'wednesday':
    echo '水曜日';
    break;
  case 'thursday':
    echo '木曜日';
    break;
  case 'friday':
    echo '金曜日';
    break;
  case 'saturday':
    echo '土曜日';
    break;
  case 'sunday':
    echo '日曜日';
    break;
  default:
    echo '何曜日ですか？';
    break;
}


// 論理演算

$old = 18;

if ($old > 10 && $old < 30) {
  print "変数は10より大きく30より小さい";
}

$sugaku = 45;
$eigo = 82;

if ($sugaku > 50 || $eigo > 50) {
  print "合格";
}

$x = true;

if ($x) {
  echo "真です";
} else {
  echo "偽です";
}

if (!$x) {
  echo "偽です";
} else {
  echo "真です";
}


// for

for ($i = 0; $i <= 10; $i++) {
  echo $i . "<br/>";
}
echo "結果";

for ($e = 0; $e <= 6; $e++) {
  echo ' ' . $e . ' ';
}
echo "結果";

for ($s = 0; $s <= 10; $s++) {
  echo $s . "<br/>";
  if ($s == 5) {
    echo 'continue<br/>';
    continue;
  }
}
echo "終了";
echo "結果";

for ($b = 0; $b <= 10; $b++) {
  echo ' ' . $b . ' ';
  if ($b == 5) {
    echo 'continue';
    continue;
  }
}

echo "終了 ; 結果<br/>";

for ($n = 0; $n <= 10; $n++) {
  echo $n . "<br/>";
  if ($n == 4) {
    break;
  }
}

echo "<br/>";
?>

<?php
echo "<br/>";
echo 'continue<br/>';
echo "終了 結果";
for ($n = 0; $n <= 10; $n++) {
  echo ' ' . $n . ' ';
  if ($n == 4) {
    break;
  }
}
echo "終了";
for ($d = 0; $d <= 10; $d++) {
  echo $d;
  if ($d == 4) {
    break;
  }
}

for ($f = 0; $f <= 10; $f++) {
  echo $f;
  if ($f == 4) {
    break;
  }
}





//while

$val = 0;

while ($val < 5) {
  echo $val;
  $val++;
}

$num = 0;

do {
  print "num=" . $num;
  $num += 1;
} while ($num < 3);

$num2 = 0;

do {
  print " " . "num=" . " " . $num2;
  $num2 += 1;
} while ($num2 < 3);


?>




<?php
// foreach

$array = ['卵', '牛乳', 'トマト', 'キャベツ', 'リンゴ', 'オレンジ'];

foreach ($array as $value) {
  echo $value . "<br/>";
}

foreach ($array as $value) {
  echo $value;
}


$bag = [
  'リスト1' => '卵',
  'リスト2' => '牛乳',
  'リスト3' => 'トマト',
  'リスト4' => 'キャベツ',
  'リスト5' => 'リンゴ',
  'リスト6' => 'オレンジ'
];

foreach ($bag as $key => $value) {
  echo '買い物' . $key . 'つ目は、' . $value . 'です。<br/>';
}

$array = ['卵','牛乳','トマト','キャベツ','リンゴ','オレンジ'];
foreach ($array as  $key =>$value){
    echo  $key.":".$value. "<br/>";
}


?>