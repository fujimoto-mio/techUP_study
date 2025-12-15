<?php
//このファイルで、Patientクラスを利用した動作を確認する。

//クラスファイルを読み込む
require_once 'Patient.php';
//Patientファイルを読み込む→PatientファイルがPersonファイルを読み込む//
//上記の流れがあるおかげでこのファイルはPatientクラスとPersonクラスを利用することができる。
?>
<!DOCTYPE html>
<!--HTMLです！というDOCTYPE宣言-->
<html lang="ja">
	<!--このhtmlは日本語で書きますと宣言-->
	<meta charset="utf-8">
	<head>
		<title>techUP　オブジェクト指向　課題</title> 
<!--タブに表示する文字を記入--> 		
	</head>
	<body>
<?php
//インスタンスを生成する
$patient = new Patient('塗木 統耶', 23, 'm', 1.75, 70);
//↑で名前、年齢、性別、身長、体重を指定した Patient クラスのインスタンス public function __construct($name, $age, $gender, $height, $weight)を生成します。
 
print($patient -> selfIntroduction());//Person.phpで定義した患者の自己紹介文を生成する
print('<br>身長：' . $patient -> getHeight() . 'm');//患者の身長を表示する
print('<br>体重：' . $patient -> getWeight() . 'kg');//患者の体重を表示する
print('<br><br>');
print('標準体重は' . $patient -> calculateStandardWeight() . 'kgです。');//Patient.phpで作成した標準体重のメソッドを利用し、標準体重を表示する。
?>
	</body>
</html>