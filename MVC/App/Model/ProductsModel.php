<?php 
namespace App\Model;
use PDO;
class ProductsModel extends \Core\Model{
    
        public static function insert($query){
            $db = static::getDB();
            $result = $db -> exec($query);
            $lastId = $db -> lastInsertId();
            return $lastId;
        }

        public static function selectSubCategories(){
            $db = static::getDB();
            $stmt = $db -> query("SELECT * FROM categories WHERE parentCategory != 0");
            $result = $stmt -> fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        public static function selectAll(){
            $db = static::getDB();
            $stmt = $db -> query("SELECT * FROM products");
            $result = $stmt -> fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        public static function delete($query){            
            $db = static::getDB();
            $result = $db -> exec($query);
            return $result;
        }

        public static function selectRow($query){
            
            $db = static::getDB();
            $stmt = $db -> query($query);
            $result = $stmt -> fetch(PDO::FETCH_ASSOC);
            return $result;
        }

        public static function update($query){
            $db = static::getDB();
            $result = $db -> exec($query);
            return $result;
        }
}
?>