<?php

namespace Core\Database;

use \PDO;


class MysqlDatabase{


    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    private $pdo;

    private $dbh;
    private $stmt;
    private $error;


    public function __construct(){
        
    }


    private function getPDO(){

        if($this->pdo === null){
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;

            $pdo = new PDO($dsn, $this->user, $this->pass);

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            $this->pdo = $pdo;
            
        }


        return $this->pdo;

    }

    //Prepare statement with query
     
    public function query($sql){
        $this->stmt = $this->getPDO()->prepare($sql);
        
    }

    //Bing values
    public function bind($param, $value, $type = null){
        if(is_null($type)){
            switch(true){
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }

    //Exercute the prepared statement
    public function execute(){
        return $this->stmt->execute();
    }

    //Get result set as array of objects
    public function resultSet(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    //Get single record as object
    public function single(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    //Get row count
    public function rowCount(){
        return $this->stmt->rowCount(); 
    }

}