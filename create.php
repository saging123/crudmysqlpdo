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
if (!empty($_POST['submit'])) {
    // get the payload fname,lname,age
    $userid = uniqid('usr_');
    $fname = $_POST['fname'];
    $lname =  $_POST['lname'];
    $age = $_POST['age'];
    // INSERT
    try {
        $insert = $dbcon->prepare('INSERT INTO users (`userid`,`fname`,`lname`,`age`) VALUES(:userid, :fname,:lname,:age)');
        $insert->bindParam(':userid', $userid, PDO::PARAM_STR);
        $insert->bindParam(':fname', $fname, PDO::PARAM_STR);
        $insert->bindParam(':lname', $lname, PDO::PARAM_STR);
        $insert->bindParam(':age', $age, PDO::PARAM_INT);
        $insert->execute();
        echo 'Inserted <a href="formcreate.html">Register Another One</a>';
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}else{
    echo "You do not send any data";
}




