<?php 
namespace App\Model;
use PDO;
class UserModel extends \Core\Model{
    
        public static function insert($query){
        
            $db = static::getDB();
            $result = $db -> exec($query);
            $lastId = $db -> lastInsertId();
            return $lastId;
        
        }

        public static function select($query){

            $db = static::getDB();
            $stmt = $db -> query($query);
            $result = $stmt -> fetchAll(PDO::FETCH_ASSOC);
            return $result;
        
        }

        public static function getRow($query){

            $db = static::getDB();
            $stmt = $db -> query($query);
            $result = $stmt -> fetch(PDO::FETCH_ASSOC);
            return $result;
        }
}