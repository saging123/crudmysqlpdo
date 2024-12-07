<?php
// import DB config File
require_once 'config/Database.php';

$dbCon = null;

// Init DB Connector
try {
    $dbCon = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
    $dbCon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $th) {
    $th->getMessage();
}
$is_success = false;

$prod_id = uniqid("prod_"); // prod_xxxxxxx
$prod_name = "Alugbati";
$prod_price = 15.75;


//create portion
try {
    $insert = $dbCon->prepare("INSERT INTO tblname (`product_id`, `name`,`price`) VALUES (:prodid,:prodname,:prodprice)");
    $insert->bindParam(':prodid', $prod_id, PDO::PARAM_STR);
    $insert->bindParam(':prodnam', $prod_name, PDO::PARAM_STR);
    $insert->bindParam(':prodprice', $prod_price, PDO::PARAM_STR);
    $insert->execute();
    $is_success = true;
} catch (PDOException $th) {
    $th->getMessage();
}

if($is_success){
    echo "Inserted Successfully";
}
else{
    echo "Failed to Insert!";
}
