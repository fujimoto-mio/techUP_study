<?php
require_once 'IDrip.php';
class Tea implements IDrip{
    private $name = 'ティー';
    public function drip(){
        return $this->name;
    }
    public function dripWithMilk(){
        return 'ミルク' . $this->name;
    }
}
