<?php


class DbCon{

private $dbCon;

public function __construct(array $config) {
    try {
        $this->dbCon = new PDO("mysql:host={$config['host']};dbname={$config['dbname']}", $config['username'], $config['password']);
        $this->dbCon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
/**
 * Return the PDO instance
 */
public function getConnection(){
    return $this->dbCon;
}





}