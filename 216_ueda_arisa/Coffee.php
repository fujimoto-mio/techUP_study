<?php
require_once 'IDrip.php';

class Coffee implements IDrip
{
    private $name = 'コーヒー';

    public function drip(){
    return $this->name;
 }

    public function dripWithMilk(){
    return 'ミルク' . $this->name . '(微糖)';
 }
}