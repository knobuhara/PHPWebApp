<?php
require("./dbcon.php");
session_start();

try {
    $member = $db->prepare('SELECT * FROM member_tbl');
    $member->execute();
    //    $member->query('SELECT * FROM member_tbl');
        $row_cnt = $member->rowCount();
        while($m = $member->fetch()){
            $members[] = $m;
        }
//        var_dump($members);
} catch (\PDOException $th) {
    echo "DB接続エラー".$th->getMessage();
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>宣原PHP登録システム　DB一覧</title>

</head>
<body>
<h1 class="text-primary">宣原PHP登録システムDB一覧表示</h1> 
 
レコード件数：<?php echo $row_cnt."件"; ?>
 
<div class="content">
    <table class='table table-striped'>
    <tr class="table-success">
        <td class="table-success">id</td>
        <td class="table-success">name</td>
    </tr>
 
    <?php 
        foreach($members as $rows){
    ?> 
    <tr class="table-success"> 
	    <td class="table-success"><?php echo $rows['name']; ?></td> 
	    <td class="table-success"><?php echo htmlspecialchars($rows['email'],ENT_QUOTES,'UTF-8'); ?></td> 
    </tr> 
    <?php 
        } 
    ?>
    </table>
    </div>
        <a href="./index.php">登録画面に戻る</a>
    <div>
</div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
