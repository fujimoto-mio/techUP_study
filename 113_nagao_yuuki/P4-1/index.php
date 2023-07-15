<?php
//クラスファイルを読み込む
require_once 'Patient.php';
?>
<!DOCTYPE html>
<html lang="ja">
	<meta charset="utf-8">
	<head>
		<title>techUP　オブジェクト指向　課題</title>
	</head>
	<body>
<?php
//インスタンス(インスタンスは、クラスで定義したプロパティを受け継いでいるもの)を生成
$patient = new Patient('長尾勇希', 30, 'm', 1.72, 70.5);
 
print($patient -> selfIntroduction());
print('<br>身長：' . $patient -> getHeight() . 'm');
print('<br>体重：' . $patient -> getWeight() . 'kg');
print('<br><br>');
print('標準体重は' . $patient -> calculateStandardWeight() . 'kgです。');
?>
	</body>
</html>