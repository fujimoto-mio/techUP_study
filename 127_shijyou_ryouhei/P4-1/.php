index.php
まず患者クラスを読み込む。
言語を日本語に設定し、文字コードを"utf-8"に設定。
タイトルを”techUP　オブジェクト指向　課題”と表示。
新しい患者の情報を入力。
身長、体重と、計算した標準体重を表示させる。

patient.php
まず、人のクラスを読み込む。
患者クラスを継承する。
クラス内からのみアクセス可能な”private”で身長と体重を設定する。
必要な変数として名前、年齢、性別、身長、体重を入力。
親クラスの中で実行する為、”parent::__construct”を実行し、名前、年齢、性別を呼び出す。
身長と体重を初期化。
それぞれ、標準体重、身長、体重を表示。

person.php
まず、人のクラスを読み込む。
クラス内からのみアクセス可能な”private”で名前と年齢と性別を設定する。
もし"m"の場合は"男性"と、もし"f"の場合は”女性”と、どちらでもなければ”性別は不明”となる様設定。
私は、名前。何歳。性別。です。と表示。
年齢を追加。