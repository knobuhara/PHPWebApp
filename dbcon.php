<?php
try {
    $db = new PDO('mysql:dbname=nobuharaDB;charset=utf8mb4', 'nobuhara', '0911');
}   catch (PDOException $e) {
    echo "データベース接続エラー　：".$e->getMessage();
}
?>