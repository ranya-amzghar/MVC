<?php

class Database{
    public static function getConnection(): PDO{
        try {
            $db = new PDO("mysql:host=localhost;dbname=salons_foires;charset=utf8mb4","root","nez8ko$$");
            $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $db;
        }catch(PDOException $e){
            throw new Exception("Database connection failed", 0, $e);
        }
    }
}
?>