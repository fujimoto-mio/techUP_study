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
//インスタンスを生成する
$patient = new Patient('山岸一角', 27, 'm', 1.85, 85.5);

print($patient -> selfIntroduction());
print('<br>身長：' . $patient -> getHeight() . 'm');
print('<br>体重：' . $patient -> getWeight() . 'kg');
print('<br><br>');
print('標準体重は' . $patient -> calculateStandardWeight() . 'kgです。');
?>
	</body>
</html>