<?php
if ($_COOKIE['text']) {
    echo $_COOKIE['text'];  //保存されている値の表示
} else {
    setcookie('text', $_POST['text'], time() + 10); //10秒間保持
}

session_start();

?>

<!DOCTYPE html>
<html lang="jp">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>
    <?php

    function func($text) {  //関数の指定
        try {
            if($text == '') {  //値が空だった場合
                throw new Exception();
            }
            echo $text;  //からでなければ実行
        } catch(Exception $e) {
            echo "空欄です";
        }
    }
    func($_POST['text']);



    ?>
    <form method="post" action="">
        <input type="text" name="text" value="">
        <input type="submit" name="button" value="送信">
    </form>
</body>

</html>