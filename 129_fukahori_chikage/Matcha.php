<?php
require_once 'IDrip.php';
class Matcha implements IDrip{
    private $name = '抹茶';
    public function drip(){
        return $this->name;
    }
    public function dripWithMilk(){
        return $this->name . 'ミルク';
    }
}