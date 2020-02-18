<?php 
    namespace App\Model;
    use PDO;

    class CmsModel extends \Core\Model{
        public function selectPage($urlKey){
            $db = static::getDB();
            $query = "SELECT * FROM cms_pages WHERE urlKey = '$urlKey'";
            $stmt = $db -> query($query);
            $result = $stmt -> fetch(PDO::FETCH_ASSOC);
            return $result;
        }

        public function selectFooter(){
            $db = static::getDB();
            $query = "SELECT * From cms_pages";
            $stmt = $db -> query($query);
            $result = $stmt -> fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        public function selectHeader(){
            $db = static::getDB();
            $query = "SELECT * FROM categories WHERE parentCategory != '0'";
            $stmt = $db -> query($query);
            $result = $stmt -> fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }

?>