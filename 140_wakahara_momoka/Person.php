<?php
class Person{
    private $name ='';
    private $age = 0;
    private $gender ='';

    public function __construct($name, $age, $gender){
        $this -> name = $name;
        $this -> age = $age;
        $this -> gender = $gender;
    }

    public function selfIntroduction(){
        if($this -> gender =='m'){
            $gendata ='男性';
        }else if($this -> gender =='f'){
            $gendata ='女性';
        }else{
            $gendata ='[性別は不明]';
        }
        return'わたしは' . $this -> name . '、' .$this -> age . '才、' . $gendata . 'です。';
    }

    public function addAge(){
        $this -> age++;
    }
}