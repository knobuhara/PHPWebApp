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
        $member = dbConnect()->prepare('SELECT COUNT(*) as cnt FROM member_tbl WHERE email=?');
        $member->execute(array(
            $_POST['email']
        ));
        $record = $member->fetch();
        if ($record['cnt'] > 0) {
            $error['email'] = 'duplicate';
        }
    }
 
    /* エラーがなければ次のページへ */
    if (!isset($error)) {
        $_SESSION['join'] = $_POST;   // フォームの内容をセッションで保存
        header('Location: userconfirm.php');   // check.phpへ移動
        exit();
    }else{
        /*
        echo <<<EOM
        <script type="text/javascript">
        alert("フォームを正しくご記入ください！");
        </script>
        EOM;
        */
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <!--
    <link rel="stylesheet" href="css/style_bs.css"> 
    -->

    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <link href="https://unpkg.com/sanitize.css" rel="stylesheet"/>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="css/style_bs.css"> 
    <script src="./js/func.js"></script>

    <title>アカウント作成</title>
</head>
<body>
<div class="container">
    <h1>宣原PHP登録システム　アカウント作成</h1>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="wrap">
            <p class="bg-success text-center">次のフォームに必要事項をご記入し、登録してください。</p>
                <p class="form-title">
                    アカウント作成</p>
                <form class="login" action="" method="POST">
                <hr class="colorgraph">
                <input type="text" name="name" placeholder="Username" />
                <input type="email" name="email" placeholder="Email" />
                <input type="password" name="password" placeholder="Password" />
                <input type="submit" value="確認する" class="btn btn-success btn-sm" />
                <hr class="colorgraph">
                <br>
                <br>
                <div>
                    <a href="./login.php">登録済みはこちらからログイン</a>
                </div>
                <div class="remember-forgot">
                    <div class="row">
                        <div class="col-md-6 forgot-pass-content">
                            <a href="javascription:void(0)" class="forgot-pass">Forgot Password</a>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>