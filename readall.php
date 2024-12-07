<?php
require_once 'config/database.php';
require_once 'DbCon.php';
$dbConnector = new DbCon($config);
$dbcon = $dbConnector->getConnection();
$records = [];
try {
    $readAll = $dbcon->prepare('SELECT * FROM users');
    $readAll->execute();
    $records = $readAll->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo $e->getMessage();
}


echo json_encode($records);




