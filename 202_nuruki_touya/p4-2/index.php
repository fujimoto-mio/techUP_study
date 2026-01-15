<?php
//多重も可能です
interface hoger {
    public function t1();
    public function t2();
}
interface fooer {
    public function t2();
    public function t3();
}
// hogeとfooを継承してみる
class bar implements hoger, fooer {
    public function t1() {
        echo "bar's t1() <br>";
    }
    public function t2() {
        echo "bar's t2() <br>";
    }
    public function t3() {
        echo "bar's t3() <br>";
    }
}
$obj_1 = new bar();
$obj_1->t1();
$obj_1->t2();
$obj_1->t3();