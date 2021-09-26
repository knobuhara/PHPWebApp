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
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="css/style_bs.css"> 
    <script src="./js/func.js"></script>

    <title>ログイン</title>
</head>
<body>
<div class="container">
<h1>宣原PHP登録システム　ログイン</h1>
<div class="row" style="margin-top:20px">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
		<form role="form" method="POST">
			<fieldset>
				<hr class="colorgraph">
				<div class="form-group">
                    <input type="text" name="name" id="name" class="form-control input-lg" placeholder="Username">
				</div>
				<div class="form-group">
                    <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address">
				</div>
				<div class="form-group">
                    <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password">
				</div>
<!--
                <span class="button-checkbox">
					<button type="button" class="btn" data-color="info">Remember Me</button>
                    <input type="checkbox" name="remember_me" id="remember_me" checked="checked" class="hidden">
                    <a href="" class="btn btn-link pull-right">Forgot Password?</a>
				</span>
-->
                <div class="remember-forgot">
                    <div class="row">
                        <div class="col-md-6 forgot-pass-content">
                        <a href="" class="btn btn-link pull-right">Forgot Password?</a>
                        </div>
                    </div>
                </div>
                <hr class="colorgraph">
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6">
                        <input type="submit" class="btn btn-lg btn-success btn-block" value="ログイン">
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6">
						<a href="./index.php" class="btn btn-lg btn-primary btn-block">登録</a>
					</div>
				</div>
			</fieldset>
		</form>
	</div>
</div>
</div>
</body>
</html>
