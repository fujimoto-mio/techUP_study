<?php
 
//テスト配列
$array = array('test1', 'test2', 'test1', 'test3', 'test2', 'test');
 
//配列で重複している物を削除する
$unique = array_unique($array);
 
var_export($unique); //デバッグ用関数です。