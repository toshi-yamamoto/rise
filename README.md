# レストラン予約システム (Restaurant Reservation System)

本システムはレストラン予約を効率的に管理・利用するためのWebアプリケーションです。ユーザー、店舗代表者、管理者がそれぞれの役割でシステムを利用できます。

# 概要 (Overview)

このシステムは、ユーザーがレストランを検索し、予約やお気に入り登録ができるWebアプリケーションです。店舗代表者は店舗情報や予約情報を管理でき、管理者はシステム全体を管理する機能を提供します。

# 機能 (Features)

一般ユーザー向け
	•	レストラン検索: 地域、ジャンル、キーワードで検索可能。
	•	予約管理: レストランの予約が可能。予約内容はマイページで確認・削除できます。
	•	お気に入り機能: 気に入ったレストランをお気に入りに追加可能。

店舗代表者向け
	•	店舗情報の管理: 店舗の情報を登録・更新。
	•	予約情報の確認: 自店舗の予約状況を確認可能。

管理者向け
	•	店舗代表者の作成: 店舗代表者アカウントを作成可能。
	•	システム管理: ユーザーや店舗代表者の管理機能。

# 開発環境 (Development Environment)
	•	フレームワーク: Laravel 8.x
	•	データベース: MySQL
	•	フロントエンド: Bootstrap 5
	•	使用言語: PHP, HTML, CSS, JavaScript
	•	バージョン管理: Git
	•	ホスティング: AWS または任意のクラウドサービス

# 必要な環境 (Requirements)
	•	PHP >= 8.0
	•	Composer
	•	MySQL >= 5.7
	•	Node.js と npm (Laravel Mix使用時)

# セットアップ (Setup)

1. リポジトリのクローン

git clone https://github.com/your-repository/restaurant-reservation-system.git
cd restaurant-reservation-system

2. 環境ファイルの設定

.env ファイルを作成し、以下の設定を記述してください。

APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=restaurant_db
DB_USERNAME=root
DB_PASSWORD=root_password

3. データベースのマイグレーションとシーディング

php artisan migrate --seed

4. サーバーの起動

php artisan serve

# 使用方法 (Usage)

ユーザーの基本機能
	•	レストラン検索
	•	ホームページで条件を指定して検索できます。
	•	URL: http://localhost/index

	•	予約する
	•	詳細ページから予約フォームに入力し、予約を確定します。
	•	URL: http://localhost/restaurants/{id}詳細ページ例 (例: id は対象のレストランID)

	•	お気に入りに追加
	•	ハートアイコンをクリックしてお気に入りを登録または削除します。
	•	URL: http://localhost/mypage

店舗代表者向け機能
	•	店舗情報の登録
	•	ダッシュボードから店舗情報を作成できます。
	•	URL: http://localhost/restaurants/create

	•	予約状況の確認
	•	自店舗の予約状況をダッシュボードで確認できます。
	•	URL: http://localhost/owners/dashboard

管理者向け機能
	•	店舗代表者の作成
	•	管理者ダッシュボードから店舗代表者を作成します。
	•	URL: http://localhost/adimin/dashboard

	•	店舗代表者一覧
	•	登録済みの店舗代表者を確認できます。
	•	URL: http://localhost/admin/owners/index

# ディレクトリ構成 (Directory Structure)

  .
├── app/              # コントローラーやモデルなどアプリケーションロジック
├── database/         # マイグレーションやシーディングファイル
├── public/           # 公開ディレクトリ（フロントエンドファイルなど）
├── resources/        # BladeテンプレートやCSSファイル
├── routes/           # ルーティング設定 (web.php)
├── .env              # 環境設定ファイル
└── ...

# 主なファイル構成
	•	routes/web.php: ルート設定。ページ遷移やAPI呼び出しを定義。
	•	app/Http/Controllers/RestaurantController.php: レストランに関する管理ロジック。
	•	app/Http/Controllers/AdminController.php: 管理者用ロジック。
	•	app/Http/Controllers/OwnerController.php: 店舗代表者用ロジック。
	•	resources/views: Bladeテンプレート。

# 使用技術 (Technologies)
	•	Laravel: フレームワーク
	•	Bootstrap: フロントエンドスタイル
	•	Carbon: 日付操作ライブラリ（予約日付・時間の計算に使用）

# 開発者向けメモ (For Developers)
	•	Bladeテンプレートを使用し、ビューとバックエンドを効率的に連携。
	•	フロントエンドでAJAXを利用して非同期処理（お気に入り登録など）を実現。
	•	ロールベースのアクセス制御（admin, owner, user）をミドルウェアで実装。