    <?php
    //課題１：今日の日付と時間
    // タイムゾーンを設定
    date_default_timezone_set('Asia/Tokyo');

    // 現在の日付と時間を取得
    $currentDateTime = date('Y年m月d日 H:i:s');
    
    echo "現在の日付と時間: $currentDateTime<br>";


    //課題２：昨日、明日、一週間後の日付
    // 昨日の日付
    $yesterday = date('Y年m月d日', strtotime('-1 day'));

    // 明日の日付
    $tomorrow = date('Y年m月d日', strtotime('+1 day'));

    // 一週間後の日付
    $nextWeek = date('Y年m月d日', strtotime('+1 week'));

    echo "昨日の日付: $yesterday<br>";
    echo "明日の日付: $tomorrow<br>";
    echo "一週間後の日付: $nextWeek<br>";
    

    //課題３：今日から３ヶ月後の日付とタイムスタンプ
    
    // 今日の日付
    $today = new DateTime();
    // ３ヶ月後の日付を計算
    $threeMonthsLater = clone $today;
    $threeMonthsLater->modify('+3 months');
    

    // タイムスタンプの計算
    $timestampToday = $today->getTimestamp();
    $timestampThreeMonthsLater = $threeMonthsLater->getTimestamp();
    $daysDiff = ($timestampThreeMonthsLater - $timestampToday) /86400;

    echo "今日から３ヶ月後の日付: " . $threeMonthsLater->format('Y年m月d日') . "<br>";
    echo "今日から３か月後までの日数: $daysDiff 日";
    ?>




