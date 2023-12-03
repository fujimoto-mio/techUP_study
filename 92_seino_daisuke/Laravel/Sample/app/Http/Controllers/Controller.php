<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}

try {
 
    // データベースに接続する命令文　ホスト名とユーザ名　パスワードを記述
    $pdo = new PDO('mysql:charset=UTF8;dbname=test;host=localhost', 'username', 'password');
   
  } catch(PDOException $e) {
   
    // 接続が失敗したときのエラーメッセージを出力
    echo $e->getMessage();
   
  } finally {
   
    // エラーのときのデータベースの接続解除
    $pdo = null;
  }

  $id = 1;
$email = 'sato@gray-code.co.jp';
$tel = '090-11xx-xxxx';
 
 
try {
 
  // (2) データベースに接続
  $pdo = new PDO('mysql:charset=UTF8;dbname=test;host=localhost', 'username', 'password');
 
  // (3) トランザクション開始
  $pdo->beginTransaction();
 
  // (4) ★ここでデータを更新するSQL
  $stmt = $pdo->prepare('UPDATE users SET email = :email, tel = :tel WHERE id = :id');
 
  // (5) 更新したい値をセットする
  $stmt->bindParam( ':id', $id, PDO::PARAM_INT);
  $stmt->bindParam( ':email', $email, PDO::PARAM_STR);
  $stmt->bindParam( ':tel', $tel, PDO::PARAM_STR);
 
  // (6) SQL実行
  $res = $stmt->execute();
 
  // (7) コミット
  if( $res ) {
    $pdo->commit();
  }
 
} catch(PDOException $e) {
 
  // (8) エラーメッセージを出力
  echo $e->getMessage();
  
  // (9) 更新失敗したら保存しないでもどす（ロールバック）
  $pdo->rollBack();
 
} finally {
 
  // (10) データベースの接続解除
  $pdo = null;
}

$first_name = '太郎';
$last_name = '佐藤';
$email = 'sato@gray-code.com';
$tel = '080-xxxx-xxxx';
 
try {
 
  // (2) データベースに接続
  $pdo = new PDO('mysql:charset=UTF8;dbname=test;host=localhost', 'username', 'password');
 
  // (3) トランザクション開始
  $pdo->beginTransaction();
 
  // (4) ★データを登録するSQL内容
  $stmt = $pdo->prepare('INSERT INTO users (
    first_name, last_name, email, tel
  ) VALUES (
    :first_name, :last_name, :email, :tel
  )');
 
  // (5) 値をセット
  $stmt->bindParam( ':first_name', $first_name, PDO::PARAM_STR);
  $stmt->bindParam( ':last_name', $last_name, PDO::PARAM_STR);
  $stmt->bindParam( ':email', $email, PDO::PARAM_STR);
  $stmt->bindParam( ':tel', $tel, PDO::PARAM_STR);
 
  // (6) SQL実行
  $res = $stmt->execute();
 
  // (7) コミット
  if( $res ) {
    $pdo->commit();
  }
 
} catch(PDOException $e) {
 
  // (8) エラーメッセージを出力
  echo $e->getMessage();
  
  // (9) 書き込み失敗したらロールバック
  $pdo->rollBack();
 
} finally {
 
  // (10) データベースの接続解除
  $pdo = null;
}

try {
 
    // (1) データベースに接続
    $pdo = new PDO('mysql:charset=UTF8;dbname=test;host=localhost', 'username', 'password');
   
    // (2) データを取得するSQL　
    $stmt = $pdo->prepare('SELECT * FROM users WHERE 2 < id AND tel IS NOT NULL');
   
    // (3) SQL実行　　$resに結果が配列で渡されます
    $res = $stmt->execute();
    // var_dump($res);
   
    // (4) データを先頭から順に出力
    while($data = $stmt->fetch()) {
      var_dump($data['first_name']);
    }
   
  } catch(PDOException $e) {
   
    // (5) データが取得できなかったら、エラーメッセージを出力
    echo $e->getMessage();
   
  } finally {
   
    // (6) データベースの接続解除
    $pdo = null;
  }