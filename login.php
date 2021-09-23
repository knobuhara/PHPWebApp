<?php 
require_once("./dbcon.php");
session_start();
 
if (!empty($_POST)) {
    /* 入力情報の不備を検知 */
    if ($_POST['email'] === "") {
        $error['email'] = "blank";
    }
    if ($_POST['password'] === "") {
        $error['password'] = "blank";
    }
    
    /* メールアドレスの重複を検知 */
    if (!isset($error)) {
        $member = dbConnect()->prepare('SELECT * FROM member_tbl WHERE email=?');
        $member->execute(array(
            $_POST['email']
        ));
        $record = $member->fetch();
    }
    /* ヒットすれば次のページへ */
    if(password_verify($_POST['password'], $record['password'])){
        $_SESSION['join'] = $_POST;   // フォームの内容をセッションで保存
        header('Location: main.php');   // main.phpへ移動
    }else{
        echo "ログイン認証に失敗しました";
    }
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <title>アカウント作成</title>
    <link href="https://unpkg.com/sanitize.css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="content">
        <form action="" method="POST">
            <h1>ログイン</h1>
            <p>次のフォームに必要事項をご記入し、ログインしてください。</p>
            <br>
 
            <div class="control">
                <label for="name">ユーザー名</label>
                <input id="name" type="text" name="name">
            </div>
 
            <div class="control">
                <label for="email">メールアドレス<span class="required">必須</span></label>
                <input id="email" type="email" name="email">
                <?php if (!empty($error["email"]) && $error['email'] === 'blank'): ?>
                    <p class="error">＊メールアドレスを入力してください</p>
                <?php elseif (!empty($error["email"]) && $error['email'] === 'duplicate'): ?>
                    <p class="error">＊このメールアドレスはすでに登録済みです</p>
                <?php endif ?>
            </div>
 
            <div class="control">
                <label for="password">パスワード<span class="required">必須</span></label>
                <input id="password" type="password" name="password">
                <?php if (!empty($error["password"]) && $error['password'] === 'blank'): ?>
                    <p class="error">＊パスワードを入力してください</p>
                <?php endif ?>
            </div>
 
            <div class="control">
                <button type="submit" class="btn">ログイン</button>
            </div>
        </form>
    </div>
</body>
</html>
