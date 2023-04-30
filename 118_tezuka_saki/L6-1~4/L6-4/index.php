<?php
if(isset($_POST['name'])){
	setcookie('name',$_POST['name'],time()+10);
}

    if(isset($_COOKIE['name'])){
        $memoryName = $_COOKIE['name'];
    }else{
        $memoryName = "";
    }

if(isset($_POST['name'])){
    $count = mb_strlen($_POST['name']);
}else{
    $count = 0;
}

try{
    if($count === 0){
        throw new Exception('名前を入力してください');
    }
}catch(Exception $e){
    echo $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>オブジェクト＆クラス</title>
</head>
<body>
<form  method="post" action="">
    名前：<input type="text" name="name" value="<?=$memoryName?>">
    <input type="submit" name="button" value="保存">

</form>
</body>
</html>