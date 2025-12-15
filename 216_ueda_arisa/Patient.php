<?php
require_once 'Person.php';
 
class Patient extends Person
{
	private $height = 0;		
	private $weight = 0;		
 
	public function __construct($name, $age, $gender, $height, $weight){
		parent::__construct($name, $age, $gender);
 
		$this -> height = $height;
		$this -> weight = $weight;
	}
 
	public function calculateStandardWeight(){
		return $this -> height * $this -> height * 22;
	}
 
	public function getHeight(){
		return $this -> height;
	}
	public function getWeight(){
		return $this -> weight;
	}
}