# 勤怠管理システム
- 出・退勤、休憩時間といった勤務実績の記録する。また、その記録の一覧にして確認可能。

## 作成した目的
- 従業員の人事評価を目的として作成。

## 環境構築
・Dockerビルド 
1. `git clone git@github.com:coachtech-material/laravel-docker-template.git`
2. `docker-compose up -d --build`

・Laravelビルド
1. `docker-compose exec php bash`
2. `composer install`
3. `cp .env.example .env` にて、環境変数を変更。
- DB_HOST=127.0.0.1   ->  DB_HOST=mysql
- DB_DATABASE=laravel ->  DB_DATABASE=laravel_db
- DB_USERNAME=root    ->  DB_USERNAME=laravel_user
- DB_PASSWORD=        ->  DB_PASSWORD=laravel_pass
4. ~~`php artisan key:generate`~~
5. ~~`php srtisan migrate`~~
6. ~~`php artisan db:seed`~~

・Carbonのインストール
1.phpコンテナ上でなければ、 `docker-compose exec php bash`
2.`composer require nesbot/carbon` にてインストール

## 機能一覧
- ログイン・ログアウト機能
- 勤怠入力機能
  - 勤務開始・勤務終了
  - 休憩開始・休憩終了
- ~~日付別勤怠一覧表示~~

## 使用技術(実行環境)
- Laravel  8.83.8
- PHP 7.4.9
- MySQL 15.1

## テーブル設計
![ER_image](https://github.com/AgatsumaT/attendance-app/blob/main/table_detail.png)

## ER図
![ER_image](https://github.com/AgatsumaT/attendance-app/blob/main/index.png)

## URL
- 開発環境：http://localhost/
- phpMyAdmin：http://localhost:8080/