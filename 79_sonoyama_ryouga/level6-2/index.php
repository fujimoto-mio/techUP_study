<!DOCTYPE html>
<html lang="jp">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <!--今日-->
    <?php
    $date = new DateTime('now');
    echo $date->format('今日はY年m月d日 H時i分s秒です。');


    ?>
    <br>

    <!--昨日-->
    <?php
    $yesterday = date("y年m月d日", strtotime("-1 day"));

    printf("昨日は%sです。\n", $yesterday);

    ?>
    <br>

    <!--明日-->
    <?php
    $tomorrow = date("y年m月d日", strtotime("1 day"));

    printf("明日は%sです。\n", $tomorrow);

    ?>
    <br>

    <!--一週間後-->
    <?php
    $week = date("y年m月d日", strtotime("1 week"));

    printf("一週間後は%sです。\n", $week);

    ?>
    <br>

    <!--三ヶ月度-->
    <?php
    $months = date("y年m月d日", strtotime("3 months"));

    printf("三ヶ月後は%sです。\n", $months);

    ?>


</body>

</html>