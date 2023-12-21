<?php
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
$patient = new Patient('山田太郎', 30, 'male', 1.65, 63.5);

echo $patient->selfIntroduction() . '<br>';
echo '身長：' . $patient->getHeight() . 'm<br>';
echo '体重：' . $patient->getWeight() . 'kg<br><br>';
echo '性別：' . $patient->getGender() . '<br>';
echo '標準体重は' . $patient->calculateStandardWeight() . 'kgです。';
?>
	</body>
</html>