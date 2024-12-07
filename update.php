<?php
require_once 'config/database.php';
require_once 'DbCon.php';
// PDO
// PHP Data Object
// mysqli deprecated since Php 7

$dbConnector = new DbCon($config);
// INIT PDO Object
$dbcon = $dbConnector->getConnection();

// check if user really clicked the submit button
if (!empty($_POST['update'])) {
    // get the payload fname,lname,age
    $userid = $_POST['userid'];
    $fname = $_POST['fname'];
    $lname =  $_POST['lname'];
    $age = $_POST['age'];
    // INSERT
    try {
        $update = $dbcon->prepare('UPDATE users SET `fname` = :fname,  `lname` = :lname ,`age` =:age  WHERE userid = :userid');
        $update->bindParam(':fname', $fname, PDO::PARAM_STR);
        $update->bindParam(':lname', $lname, PDO::PARAM_STR);
        $update->bindParam(':age', $age, PDO::PARAM_INT);
        $update->bindParam(':userid', $userid, PDO::PARAM_STR);
        $update->execute();
        echo 'Updated <a href="display.html">Back to list</a>';
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}else{
    echo "You do not send any data";
}




