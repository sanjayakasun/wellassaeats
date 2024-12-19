<?php
namespace MyApp;

use MyApp\DBConnector;
use PDO;

class user{

    public function getItems(){
        $dbuser = new DBConnector();
        $con = $dbuser->getConnection();
        $query = "SELECT * FROM menu_item";
        $pstmt = $con->prepare($query);
        $pstmt->execute();
        $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);
        return $rs;
    }

    public function searchItems($foodname){
        $dbuser = new DBConnector();
        $con = $dbuser->getConnection();
        $query = "SELECT * FROM menu_item WHERE menu_item_name LIKE CONCAT('%',?,'%')";
        $pstmt = $con->prepare($query);
        $pstmt->bindValue(1,$foodname);
        $pstmt->execute();
        $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);
        return $rs;
    }

    public function getRestaurants(){
        $dbuser = new DBConnector();
        $con = $dbuser->getConnection();
        $query = "SELECT * FROM restaurant";
        $pstmt = $con->prepare($query);
        $pstmt->execute();
        $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);
        return $rs;
    }

    public function searchItemsByID($restaurantID){
        $dbuser = new DBConnector();
        $con = $dbuser->getConnection();
        $query = "SELECT * FROM menu_item WHERE restaurant_id = ?";
        $pstmt = $con->prepare($query);
        $pstmt->bindValue(1,$restaurantID);
        $pstmt->execute();
        $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);
        return $rs;
    }

}
