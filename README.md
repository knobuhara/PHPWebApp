# PHPWebApp
php+bootstrap

## 初めてのPHPアプリを作成する
  ##### AWSのRoute53で公開URLのドメインルーティング設定完了：http://nobuhara.tk/PHPWebApp/index.php
  ##### 公開URL：~~http://to-wer.co.jp/php/index.php~~ http://54.212.121.191/PHPWebApp/index.php
  ##### 20211123 AWSでサーバを立て、トップページをデプロイしました！！
  ##### 20210926 Bootstrapでトップページをリニュアルしました！！
  <img src="https://user-images.githubusercontent.com/88915966/134770895-9916b992-ba21-4f1c-bffa-d82188734348.png" width="500">
  
### 概要
  - ユーザー名、パスワード登録、認証
  - UIはbootstrap部品を使用
    - 学習中、一部適用済み
#### 構成
  - index.php
  - userconfirm.php
  - checksuccess.php
  - login.php
  - main.php

#### 残件
  - BootstrapUI作成
  - XSS対策
    - htmlspecialcharsでエスケープ
  - CSRF対策
    - bin2hexでトークン生成

#### LalavelフレームワークでWebアプリを作成
  - 新規リポジトリを作成したので、[LaravelWebApp](https://github.com/knobuhara/LaravelWebApp)を参照
