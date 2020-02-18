<?php

namespace App\Model;
use PDO;
class TransitionModel extends \Core\Model{

    public static function insert($productId, $categoryId = []){
        
        
        foreach($categoryId as $key => $value){
            $db = static::getDB();
            $query = "INSERT INTO product_category(productId, categoryId) VALUES('$productId', '$value')";
            $result = $db -> exec($query);
            echo $query;
        }
    }

}

?>