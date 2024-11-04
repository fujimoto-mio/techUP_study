ソースの流れ
・Person.phpで基本的な個人（名前、年齢、性別）を管理するクラスを定義。
自己紹介や年齢の増加機能がある。

・patient.phpで Personクラスを継承して、患者（Patient）に特化したクラスを定義。
Patient クラスは、追加で身長と体重に関連する機能があり、標準体重を計算する機能を含む。


・index.phpでクラスを利用して、実際にメソッドを呼び出して出力を行うファイル。
クラスを使ってデータを表示したり計算を行ったりするための実行ファイル。




Person.php
    •	__construct():
		クラスがインスタンス化されたときに呼ばれるコンストラクタ。名前、年齢、性別の初期値を設定する。

	•	selfIntroduction():
		名前、年齢、性別に基づいて自己紹介文を作る。性別は「男性」「女性」または「不明」として表示。

	•	addAge():
		年齢を1つ増やす。


patient.php
    •	__construct():
		Person クラスのコンストラクタを呼び出し、名前・年齢・性別を設定し、追加で身長と体重を初期化させる。

	•	calculateStandardWeight():
    	標準体重を計算するメソッド。一般的な標準体重の計算式「身長(m) × 身長(m) × 22」を使用して結果を出す。

	•	getHeight():
		インスタンスの身長を返すメソッド。

	•	getWeight():
		インスタンスの体重を返すメソッド。

index.php
	•	require_once 'Patient.php';:
		Patient クラスを読み込み、使えるようにする。

	•	$patient = new Patient('山田太郎', 30, 'm', 1.65, 63.5);:
		Patient クラスのインスタンスを生成。名前「山田太郎」、30歳、男性、身長1.65m、体重63.5kgで初期化。

	•	$patient->selfIntroduction():
		Person クラスで定義された selfIntroduction() を呼び出して、自己紹介文を表示。

	•	$patient->getHeight() や $patient->getWeight():
		Patient クラスで定義されたメソッドで、患者の身長と体重を取得して表示。

	•	$patient->calculateStandardWeight():
		患者の標準体重を計算し表示。

        