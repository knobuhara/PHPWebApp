<?php
try {
#    $db = new PDO('mysql:dbname=nobuharaDB;charset=utf8mb4', 'nobuhara', '0911');
    $db = new PDO('mysql:host=mysql6b.xserver.jp;dbname=bears_wp1;charset=utf8mb4', 'bears_wp1', 'kuma05taka12');
}   catch (PDOException $e) {
    echo "データベース接続エラー　：".$e->getMessage();
}
?>