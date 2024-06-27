<?php
//インターフェイスファイルを読み込む
require_once 'IDrip.php';

class Tea implements IDrip
{
	//プロパティ
	private $name = 'ティー';

	//注ぐメソッドをオーバーライド
	public function drip(){
		return $this->name;
	}

	//ミルクと一緒にそそぐメソッドをオーバーライド
	public function dripWithMilk(){
		return 'ミルク' . $this->name;
	}
}