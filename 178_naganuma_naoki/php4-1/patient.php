<?php
//クラスファイルを読み込む
require_once 'Person.php';

class Patient extends Person
{
	private $height = 0;		//身長(m)
	private $weight = 0;		//体重(kg)

	public function __construct($name, $age, $gender, $height, $weight)
	{
		//Personクラスのコンストラクタを呼び出す
		parent::__construct($name, $age, $gender);

		//プロパティの初期化
		$this->height = $height;
		$this->weight = $weight;
	}

	//標準体重を返すメソッド
	public function calculateStandardWeight()
	{
		return $this->height * $this->height * 22;
	}

	//身長を返すメソッド
	public function getHeight()
	{
		return $this->height;
	}

	//体重を返すメソッド
	public function getWeight()
	{
		return $this->weight;
	}
}