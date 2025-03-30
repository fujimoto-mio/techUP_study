<?php
session_start();
$mode = "input";
$errors = []; // エラーメッセージを格納

if (isset($_POST["back"]) && $_POST["back"]) {
    // 何もしない（入力画面に戻る）
} elseif (isset($_POST["confirm"]) && $_POST["confirm"]) {
    // バリデーション（未入力チェック）
    if (empty($_POST["fullname"])) {
        $errors["fullname"] = "お名前を入力してください。";
    }
    if (empty($_POST["company"])) {
        $errors["company"] = "会社を入力してください。";
    }
    if (empty($_POST["tel"])) {
        $errors["tel"] = "電話番号を入力してください。";
    }
    if (empty($_POST["email"])) {
        $errors["email"] = "メールアドレスを入力してください。";
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = "正しいEメールアドレスを入力してください。";
    }
    if (empty($_POST["message"])) {
        $errors["message"] = "お問い合わせ内容を入力してください。";
    }

    // エラーがない場合のみセッションに保存
    if (empty($errors)) {
        $_SESSION["fullname"]      = $_POST["fullname"];        
        $_SESSION["company"]       = $_POST["company"];
        $_SESSION["tel"]          = $_POST["tel"];
        $_SESSION["email"]         = $_POST["email"];
        $_SESSION["message"]       = $_POST["message"];
        $_SESSION = array_map('htmlspecialchars', $_POST);
        $mode = "confirm";
    }
} elseif (isset($_POST["send"]) && $_POST["send"]) {
    // 再度入力チェック（セッションが空の場合）
    if (empty($_SESSION["fullname"]) || empty($_SESSION["email"]) || empty($_SESSION["message"]) 
     || empty($_SESSION["company"]) || empty($_SESSION["tel"]))
    {
        $mode = "input";
        $errors["general"] = "入力内容に誤りがあります。";
    } else {
        // 日本語メール送信の設定
        mb_language("Japanese");
        mb_internal_encoding("UTF-8");

        // メール内容
        $message = "お問い合わせを受け付けました。\r\n\r\n"
        . "【名前】" . $_SESSION["fullname"] . "\r\n"
        . "【会社】" . $_SESSION["company"] . "\r\n"
        . "【電話番号】" . $_SESSION["tel"] . "\r\n"
        . "【Eメール】" . $_SESSION["email"] . "\r\n"
        . "【お問い合わせ内容】" . $_SESSION["message"] . "\r\n";

        // メールヘッダー
        $headers = "From: misty009club@gmail.com\r\n";
        $headers .= "Reply-To: " . $_SESSION["email"] . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        //$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        // 件名のエンコーディング
        //$subject = "お問い合わせありがとうございます";
        //$encoded_subject = mb_encode_mimeheader($subject, "UTF-8");

        // ユーザーへの自動返信
        if (!empty($_SESSION["email"])) {
            mb_send_mail($_SESSION["email"], "お問い合わせありがとうございます", $message, $headers);
        }

        // 管理者への通知
        mb_send_mail("misty009club@gmail.com", "お問い合わせがありました", $message, $headers);

        // セッションをクリア
        $_SESSION = array();
        $mode = "send";
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUN.株式会社</title>
    <link rel="stylesheet" href="style.css?20250330">
</head>
<body>
  <!--header-->
  <header>
    <!--企業ロゴ-->
    <div class="container">
      <div class="header-group"></div>
      <h1 class="logo">
      <img src="images/logo.jpg" alt="SUN.株式会社 ロゴ" class="header-logo"></h1>

        <!-- ハンバーガーメニュー -->
      <div class="hamburger js-hamburger sp-show">
        <span></span>
        <span></span>
        <span></span>
      </div>
      <!-- ドロワーメニュー -->
      <div class="drawer js-drawer">
        <div class="drawer-inner">
          <div class="drawer__nav">
            <ul class="drawer__list">
              <li class="drawer__item">
                <a href="#top" class="drawer__link">TOP</a>
              </li>
              <li class="drawer__item">
                <a href="#philosophy" class="drawer__link">PHILOSOPHY・VISION</a>
              </li>
              <li class="drawer__item">
                <a href="#service" class="drawer__link">SERVICE</a>
              </li>
              <li class="drawer__item">
                <a href="#company" class="drawer__link">COMPANY</a>
              </li>
              <li class="drawer__item">
                <a href="#contact" class="drawer__link">CONTACT</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!--main-->
    <main>
      <!--Top画像オレンジイメージ-->
        <section id="top" class="top-section">
            <div class="top-image-container">
              <img src="./images/top.jpg" alt="おしゃれなオレンジイメージ"> 
            </div>
        </section>

        <!--PHILOSOPHY-->
        <section id="philosophy" class="philosophy-section">
            <div class="container">
                <h2 class="section-title"><span style="background: linear-gradient(transparent 50%, #ffe7b9 0%);">PHILOSOPHY</span></h2>
                <h3>「自ら輝き、周囲に光を与える太陽のような人材を育成する」</h3>
                <p>
                  この企業理念は、一人ひとりが持つ潜在能力を引き出し、自ら成長し続ける力を重視します。そして、その成長が周囲にも良い影響を与え、共に発展していける会社を目指します。
                </p>
                <h2 class="section-title"><span style="background: linear-gradient(transparent 50%, #ffe7b9 0%);">VISION</span></h2>
                <h3>
                  自ら輝き、共に未来を創る
                </h3>
                <p>
                  私たちは、一人ひとりの才能を最大限に引き出し、成長を促す環境を提供します。その結果、個々の成長が組織全体に光をもたらし、共に前進する企業文化を育てます。私たちは、社員が自らの力で未来を切り開き、その輝きが会社全体、そして社会に良い影響を与える、持続的な成長を実現します。</p>
                </p>
            </div>
        </section>

        <!--SERVICE-->
        <section id="service" class="service-section">
            <div class="container">
                <h2 class="section-title"><span style="background: linear-gradient(transparent 50%, #ffe7b9 0%);">SERVICE</span></h2>
                <div class="service-list">
                    <div class="service-item">
                        <h3><font color="FF6817">/</font> イベント事業</h3>
                        <div class="service-image">
                            <img src="images/event.jpg" alt="イベント事業のイメージ">
                        </div>
                          <p>当社のイベントは携帯イベントをメインとし、お客様のニーズに合わせて、さまざまな携帯電話やスマートフォンに関するイベントを企画・運営しています。</p>
                    </div>
                    <div class="service-item">
                        <h3><font color="FF6817">/</font> 買取事業</h3>
                        <div class="service-image">
                            <img src="images/purchase.jpg" alt="買取事業のイメージ">
                        </div>
                          <p>当社の買い取り事業では、お客様が不要になった物を迅速かつ高価で買い取ります。正確な査定と透明な取引を行い、どなたでも安心してご利用いただけるサービスを提供しています。</p>
                    </div>
                </div>
            </div>
        </section>

        <!--COMPANY-->
        <section id="company" class="company-section">
            <div class="container">
                <h2 class="section-title"><span style="background: linear-gradient(transparent 50%, #ffe7b9 0%);">COMPANY</span></h2>
                <!--会社情報テーブル-->
                <table class="table_design03">
                    <tbody>
                      <tr>
                        <th>会社名</th>
                        <td>SUN. 株式会社</td>
                      </tr>
                      <tr>
                        <th>代表者名</th>
                        <td>藤村日向</td>
                      </tr>
                      <tr>
                        <th>本社</th>
                        <td>〒460-0003 愛知県名古屋市中区錦二丁目5番31号
                            長者町相互ビル412</td>
                      </tr>
                      <tr>
                        <th>支社</th>
                        <td>〒981-1225 宮城県名取市飯野坂4丁目9番48-1-201</td>
                      </tr>
                      <tr>
                        <th>設立</th>
                        <td>2022年12月5日</td>
                      </tr>
                      <tr>
                        <th>従業員数</th>
                        <td>3名</td>
                      </tr>
                      <tr>
                        <th>事業内容</th>
                        <td>イベント事業、買取事業</td>
                      </tr>
                    </tbody>
                  </table>

                <div class="map-container">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3261.3940841996146!2d136.89840117522712!3d35.171729157795035!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x600376d57b26ec7b%3A0x35d025c4e992ae23!2z44CSNDYwLTAwMDMg5oSb55-l55yM5ZCN5Y-k5bGL5biC5Lit5Yy66Yym77yS5LiB55uu77yV4oiS77yT77yRIOmVt-iAheeUuuebuOS6kuODk-ODqyA0MTI!5e0!3m2!1sja!2sjp!4v1743172430699!5m2!1sja!2sjp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </section>

        <!--CONTACT-->
        <section id="contact" class="contact-section">
            <div class="container">
                <h2 class="section-title" id="contact"><span style="background: linear-gradient(transparent 50%, #ffe7b9 0%);">CONTACT</span></h2>
            </div>
        </section>    


<?php if ($mode == "input") { ?>
  <?php if (!empty($errors["general"])) { ?>
      <p style="color:red;"><?php echo htmlspecialchars($errors["general"], ENT_QUOTES, 'UTF-8'); ?></p>
  <?php } ?>
  <div id="contact">
  <form action="./index.php#contact" method="post">
      <label>ご担当者 <input type="text" name="fullname" value="<?php echo isset($_SESSION["fullname"]) ? htmlspecialchars($_SESSION["fullname"], ENT_QUOTES, 'UTF-8') : ''; ?>"></label>
      <?php if (!empty($errors["fullname"])) { ?>
          <span style="color:red;"><?php echo htmlspecialchars($errors["fullname"], ENT_QUOTES, 'UTF-8'); ?></span>
      <?php } ?>
      <br>

      <label>企業名 <input type="text" name="company" value="<?php echo isset($_SESSION["company"]) ? htmlspecialchars($_SESSION["company"], ENT_QUOTES, 'UTF-8') : ''; ?>"></label>
      <?php if (!empty($errors["company"])) { ?>
          <span style="color:red;"><?php echo htmlspecialchars($errors["company"], ENT_QUOTES, 'UTF-8'); ?></span>
      <?php } ?>
      <br>

      <label>メールアドレス <input type="email" name="email" value="<?php echo isset($_SESSION["email"]) ? htmlspecialchars($_SESSION["email"], ENT_QUOTES, 'UTF-8') : ''; ?>"></label>
      <?php if (!empty($errors["email"])) { ?>
          <span style="color:red;"><?php echo htmlspecialchars($errors["email"], ENT_QUOTES, 'UTF-8'); ?></span>
      <?php } ?>
      <br>

      <label>電話番号<input type="tel" name="tel" value="<?php echo isset($_SESSION["tel"]) ? htmlspecialchars($_SESSION["tel"], ENT_QUOTES, 'UTF-8') : ''; ?>"></label>
      <?php if (!empty($errors["tel"])) { ?>
          <span style="color:red;"><?php echo htmlspecialchars($errors["tel"], ENT_QUOTES, 'UTF-8'); ?></span>
      <?php } ?>
      <br>

      <label>メッセージ <textarea name="message" cols="30" rows="5"><?php echo isset($_SESSION["message"]) ? htmlspecialchars($_SESSION["message"], ENT_QUOTES, 'UTF-8') : ''; ?></textarea></label>
      <?php if (!empty($errors["message"])) { ?>
          <span style="color:red;"><?php echo htmlspecialchars($errors["message"], ENT_QUOTES, 'UTF-8'); ?></span>
      <?php } ?>
      <br>

      <input type="submit" name="confirm" value="確認" class="confirm_submit">
  </form>
  </div>
<?php } elseif ($mode == "confirm") { ?>
  <form class="contact-response-form" action="./index.php#contact" method="post">
    <table class="table_design04">
      <tr><th>ご担当者 </th><td><?php echo htmlspecialchars($_SESSION["fullname"], ENT_QUOTES, 'UTF-8'); ?></td></tr>
      <tr><th>企業名 </th><td> <?php echo htmlspecialchars($_SESSION["company"], ENT_QUOTES, 'UTF-8'); ?></td></tr>  
      <tr><th>電話番号</th><td> <?php echo htmlspecialchars($_SESSION["tel"], ENT_QUOTES, 'UTF-8'); ?></td></tr>
      <tr><th>メールアドレス</th><td> <?php echo htmlspecialchars($_SESSION["email"], ENT_QUOTES, 'UTF-8'); ?></td></tr>
      <tr><th>メッセージ</th><td> <?php echo nl2br(htmlspecialchars($_SESSION["message"], ENT_QUOTES, 'UTF-8')); ?></td></tr>
    </table>
        <input type="hidden" name="fullname" value="<?php echo htmlspecialchars($_SESSION["fullname"], ENT_QUOTES, 'UTF-8'); ?>">
        <input type="hidden" name="company" value="<?php echo htmlspecialchars($_SESSION["company"], ENT_QUOTES, 'UTF-8'); ?>">
        <input type="hidden" name="tel" value="<?php echo htmlspecialchars($_SESSION["tel"], ENT_QUOTES, 'UTF-8'); ?>">
        <input type="hidden" name="email" value="<?php echo htmlspecialchars($_SESSION["email"], ENT_QUOTES, 'UTF-8'); ?>">
        <input type="hidden" name="message" value="<?php echo htmlspecialchars($_SESSION["message"], ENT_QUOTES, 'UTF-8'); ?>">

        <input type="submit" name="send" value="送信" class="backbutton">
        <input type="submit" name="back" value="戻る" class="sendbutton">
  </form>

<?php } else { ?>
  <p class="form-success">送信しました。お問い合わせありがとうございました。</p>
  <a href="index.php"><button class="homebackbutton">ホームに戻る</button></a>
<?php } ?>

    </main>

    <!--footer-->
    <footer>
        <div class="container">
            <p>&copy; 2025 SUN.Inc</p>
        </div>
    </footer>

    <!--Javascript-->
    <script src="script.js"></script>
</body>
</html>
