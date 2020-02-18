<?php 

    namespace App\Model;
    use PDO;
    class CategoryModel extends \Core\Model{
        public static function selectProducts($urlKey){
            $query = "SELECT p.*
            FROM products AS p
            INNER JOIN product_category as pc
            ON
            p.productId = pc.productId
            INNER JOIN categories AS c
            ON
            c.categoryId = pc.categoryId
            WHERE c.urlKey = '$urlKey'";
        

            $db = static::getDB();
            $stmt = $db -> query($query);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>