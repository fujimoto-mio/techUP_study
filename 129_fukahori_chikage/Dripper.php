<?php
class Dripper{
    private $milkflag = false;
    public function setMilkStatus($flag){
        $this->milkflag = $flag;
    }
    public function dripDrink($drink){
        if($this->milkflag){
            return $drink->dripWithMilk();
        }
        else{
            return $drink->drip();
        }
    }
}
