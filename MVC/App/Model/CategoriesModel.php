<?php 

namespace App\Model;
use PDO;
class CategoriesModel extends \Core\Model{

        public static function selectAllCategory(){
            $db = static::getDB();
            $query = "SELECT * FROM categories";
            $stmt = $db -> query($query);
            $result = $stmt -> fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        public static function selectAllParentCategory(){
            $db = static::getDB();
            $query = "SELECT * FROM categories WHERE parentCategory = 0";
            $stmt = $db -> query($query);
            $result = $stmt -> fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } 

        public static function insert($query){
            $db = static::getDB();
            $result = $db -> exec($query);
            return $result;
        }

        public static function delete($query){
            echo $query;
            $db = static::getDB();
            $result = $db -> exec($query);
            return $result;
        }

        public static function update($query){
            $db = static::getDB();
            $result = $db -> exec($query);
            return $result;
        }

        public static function getRow($query){
            $db = static::getDB();
            echo $query;
            $stmt = $db -> query($query);
            $result = $stmt -> fetch(PDO::FETCH_ASSOC);
            return $result;
        }
}
?>