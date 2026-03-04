<?php
//クラスファイルを読み込む
require_once 'Person.php';
//このファイルでは、Person.phpファイルにあるPersonクラスをPatientクラスに継承、さらに内容を拡張している。
//Person クラスの機能に加えて、身長、体重、標準体重を計算する機能が追加している。

class Patient extends Person //PatientクラスにPersonクラスの内容を引き継ぐ。（関数を省略でき、効率的）
{
    //プロパティ==========
    private $height = 0;        //身長(m)
    private $weight = 0;        //体重(kg)
//ここでプロパティを定義し、初期値を設定
    //コンストラクタ==========
    public function __construct($name, $age, $gender, $height, $weight) {
        //Person.phpファイルの中のPersonクラスのコンストラクタを呼び出しつつ、
        parent::__construct($name, $age, $gender);
        //ここでPatientクラスで新たに定義されたプロパティの値を初期化
        $this->height = $height;
        $this->weight = $weight;
    }

    //メソッド==========
    //標準体重を返すメソッド
    public function calculateStandardWeight() {
        return $this->height * $this->height * 22;
    }

    //身長を返すメソッド
    public function getHeight() {
        return $this->height;
    }

    //体重を返すメソッド
    public function getWeight() {
        return $this->weight;
    }
}
?>