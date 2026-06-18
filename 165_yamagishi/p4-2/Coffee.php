<?php
//インターフェイスファイルを読み込む
require_once 'IDrip.php';

class Coffee implements IDrip
{
	//プロパティ
	private $name = 'コーヒー';

	//注ぐメソッドをオーバーライド
	public function drip(){
		return $this->name;
	}

	//ミルクと一緒にそそぐメソッドをオーバーライド
	public function dripWithMilk(){
		return 'ミルク' . $this->name . '(微糖)';
	}
}
