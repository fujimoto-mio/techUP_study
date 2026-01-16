# CORESERVER（V2）公開手順・環境設定（Laravel10）

本プロジェクトは **Laravel10 公式構成（public ディレクトリのみ公開）** を前提としています。

---

## 1. サーバー要件

以下の環境で動作確認しています。

- CORESERVER V2プラン
- PHP 8.1 以上
- Composer 2.x
- MySQL 5.7 以上

---

## 2. ファイルのアップロード

Laravel プロジェクト一式を、サーバー上の任意のディレクトリにアップロードしてください。

例：

/home/ユーザー名/
└── globe-nation/
├── app/
├── bootstrap/
├── config/
├── database/
├── public/
├── resources/
├── routes/
├── storage/
├── vendor/（composer install 後に作成）
└── artisan

※ `app` や `config` などのディレクトリは  
**public_html（公開ディレクトリ）には置かないでください。**

---

## 3. 公開ディレクトリ（ドキュメントルート）の設定

CORESERVER 管理画面より、  
**公開ディレクトリ（ドキュメントルート）を以下に設定してください。**

globe-nation/public

---

## 4. Composer のインストール

Laravel プロジェクトの **ルートディレクトリ**で以下を実行してください。

bash
composer install --no-dev --optimize-autoloader

---

## 5. 環境設定（.env の作成）
5-1. .env ファイルを作成
プロジェクト直下で .env.example をコピーして .env を作成してください。

bash
cp .env.example .env

5-2. .env の内容を編集
作成した .env を開き、以下の項目を実際のサーバー情報に合わせて設定してください。


アプリケーション設定

env
APP_NAME=サイト名
APP_ENV=production
APP_DEBUG=false
APP_URL=https://あなたのドメイン


データベース設定

env
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=データベース名
DB_USERNAME=ユーザー名
DB_PASSWORD=パスワード


メール設定（フォーム等を使用する場合）

env
MAIL_MAILER=smtp
MAIL_HOST=メールサーバー
MAIL_PORT=587
MAIL_USERNAME=メールアドレス
MAIL_PASSWORD=メールパスワード
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=送信元メールアドレス
MAIL_FROM_NAME=サイト名

---

## 6. アプリケーションキーの生成
.env 設定後、以下のコマンドを実行してください。

bash
php artisan key:generate

### データベース初期構築の判断方法

以下のいずれかで判断してください。

- データベースにテーブルが存在しない場合  
  → `php artisan migrate --force` を実行

- `migrations` テーブルが存在する場合  
  → すでに初期構築済みのため実行不要

※ 不明な場合は migrate を実行せず、開発者に確認してください。

---

## 7. キャッシュのクリア・最適化
bash
php artisan optimize:clear
php artisan optimize

---

## 8. 動作確認
以下が確認できれば、公開作業は完了です。

トップページが表示される

管理画面が表示・ログインできる

フォーム送信など主要機能が正常に動作する

注意事項
.env ファイルは GitHub にアップロードしないでください

.env ファイルは 公開ディレクトリ（public_html）に置かないでください

本番環境では APP_DEBUG=false を維持してください