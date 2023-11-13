<?php
//インターフェイスファイルを読み込む
require_once 'IDrip.php';

class Coffee implements IDrip
{
	//プロパティ
	private $name = 'コーヒー';

	//注ぐメソッドをオーバーライド　※ミルクがfalseの場合、名前をコーヒーと返す
	public function drip(){
		return $this->name;
	}

	//ミルクと一緒にそそぐメソッドをオーバーライド　※ミルクがtrueの場合、名前をミルクコーヒーと返す
	public function dripWithMilk(){
		return 'ミルク' . $this->name . '(微糖)';
	}
}
