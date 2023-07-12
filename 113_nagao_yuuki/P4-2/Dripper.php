<?php
class Dripper
{
	//プロパティ==========
	private $milkflag = false; //ミルクを注ぐ場合:true 注がない場合:false

	//メソッド
	//ミルク注入の可否を設定するメソッド　※$flagがtrueならミルク有、falseならミルク無
	public function setMilkStatus($flag){
		$this->milkflag = $flag;
	}

	//セットした飲み物を注ぐメソッド　※
	public function dripDrink($drink){
		if($this->milkflag){  //ミルク有の場合
			return $drink->dripWithMilk();  //ミルク有ならdripWithMilk()でミルク.$nameと名前を返すソースに繋がる
		}else{  //ミルク有の場合以外
			return $drink->drip();  //ミルク無ならdrip()で$nameと名前を返すに繋がる
		}
	}
}
