<?php
//このPersonファイルはファイル名の通り"人"の情報（名前、歳、性別）が入ったクラス（Person）が定義されており、それらに紐づけられて動作するメソッドが存在している。
class Person{
	//プロパティ==========
	private $name = '';//名前
	private $age = 0;//歳
	private $gender = '';//性別
 //ここでプロパティ定義している。
	//コンストラクタ==========
	public function __construct($name, $age, $gender){
		$this -> name = $name;
		$this -> age = $age;
		$this -> gender = $gender;
		//ここでnameの値を$name、ageの値を$age、genderの値を$genderと紐づける（初期化）
	}
 //
	//メソッド==========
	public function selfIntroduction(){
		if($this -> gender == 'm'){
			$gendata = '男性';
		}else if($this -> gender == 'f'){
			$gendata = '女性';
		}else{
			$gendata = '[性別は不明]';
		}
		//ここでgenderの値がmだったら男性、もしそれに当てはまらないなら"女性"、どちらにも当てはまらないなら性別は不明という関数を設定する
		return 'わたしは' . $this -> name . '、' . $this -> age . '才、' . $gendata . 'です。';
		//ここで「私は+”名前”+”歳”+才+”性別”+です」という名前、歳、性別を表す自己紹介文を生成する。
	}
 
 
	public function addAge(){
		$this -> age++;
		//年齢をひとつ増加させる
	}
}
?>