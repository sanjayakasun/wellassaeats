<?php

namespace classes;
use PDO;
use PDOException;

class DbConnector{
    private $host = "localhost";
    private $uname = "testuser";
    private $pw = "testuser";
    private $dbname = "wellassaeats";

    public function getconnection(){
        $dsn ="mysql:host= $this->host; dbname=$this->dbname;";

        try {
            $con = ;
        } catch (PDOException $th) {
            //throw $th;
        }
    }
}

?>