<?php
namespace MyApp;
use PDO;
use PDOException;

class DBConnector{
    private $host = "localhost";
    private $db_name = "wellassaeats";
    private $db_user = "testuser";
    private $db_password = "";

    public function getConnection(){
        $dsn = "mysql:host=$this->host;dbname=$this->db_name";
        try {
            $con = new PDO($dsn, $this->db_user, $this->db_password);
            return $con;
        } catch (PDOException $e) {
            die("Error : ".$e->getMessage());
        }
    }
}
