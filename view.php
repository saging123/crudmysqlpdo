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
    $record = $read->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo $e->getMessage();
}

if(!empty($record)){
    echo "User ID: {$record['userid']}<br/>";
    echo "First Name: {$record['fname']}<br/>";
    echo "Last Name: {$record['lname']}<br/>";
    echo "Age: {$record['age']}<br/>";
}else{
    echo 'User not Found';
}





