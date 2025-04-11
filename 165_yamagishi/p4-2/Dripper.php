<?php
class Dripper
{
	//プロパティ==========
	private $milkflag = false; //ミルクを注ぐ場合:true 注がない場合:false

	//メソッド
	//ミルク注入の可否を設定するメソッド
	public function setMilkStatus($flag){
		$this->milkflag = $flag;
	}

	//セットした飲み物を注ぐメソッド
	public function dripDrink($drink){
		if($this->milkflag){
			return $drink->dripWithMilk();
		}else{
			return $drink->drip();
		}
	}
}
