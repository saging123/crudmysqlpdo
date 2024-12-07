<?php
require_once 'config/database.php';
require_once 'DbCon.php';
$dbConnector = new DbCon($config);
$dbcon = $dbConnector->getConnection();
$record = [];
try {
    $read = $dbcon->prepare('SELECT * FROM users WHERE userid = :userid');
    $read->bindParam(':userid',$_GET['id'],PDO::PARAM_STR);
    $read->execute();
    $item = $read->fetch(PDO::FETCH_ASSOC);
    // check if has row
    if($item){
        $record = $item;
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}

echo json_encode($record);





