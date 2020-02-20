<?php 
    namespace App\Controller\Admin;
    use \Core\View;
    use \App\Model\ProductsModel;
    use \App\Model\TransitionModel;

    class Products extends \Core\Controller{

        public function indexAction()
        {
            $products = ProductsModel::selectAll();
            View::renderTemplate('Products/viewProduct.html', ["products" => $products]);
        }

        public function addEditProduct(){
           
            $categories = ProductsModel::selectSubCategories();
            View::renderTemplate('Products/addProduct.html', ["categories" => $categories]);
        }

        public function insertProduct(){
           
           
            extract($_POST);
            $name = $_FILES['image']['name'];
            $tmp_name = $_FILES['image']['tmp_name'];
            
            $location = '../public/uploads/';

            if(move_uploaded_file($tmp_name,$location.$name)){
                echo 'Uploaded!';
            }

            $path = $location.$name;
            echo $path;
           
            print_r($categories);
            $query = "INSERT INTO products(productName, SKU, urlKey, image, status, description, shortDescription, price, stock) VALUES('$productName', '$sku', '$urlKey', '$path', '$status', '$description', '$shortDescription', '$price', '$stock')";
            echo "<br>".$query;
            $productId = ProductsModel::insert($query);
            TransitionModel::insert($productId, $categories);
            
            header('Location: index');
        }

        public function deleteAction(){
           
            $id = $this -> route_params['id'];
            $query = "DELETE FROM products WHERE productId = '$id'";
            ProductsModel::delete($query);
            header('Location: ../index');
        }

        public function editAction(){
           
            $id = $this -> route_params['id'];
            $query = "SELECT * FROM products WHERE productId = '$id'";
            $categories = ProductsModel::selectSubCategories();
            $product = ProductsModel::selectRow($query);
            View::renderTemplate('Products/addProduct.html', ["product" => $product, "edit" => "edit", "categories" => $categories]);
        }

        public function updateAction(){
           
           extract($_POST);
           echo $productId;
           $query =  "UPDATE products SET productName = '$productName', SKU = '$sku', urlKey = '$urlKey', status = '$status', description = '$description', shortDescription = '$shortDescription', price = '$price', stock = '$stock' WHERE productId = '$productId'";
           echo $query;

           $result = ProductsModel::update($query);
           header('Location: index');
           
        }
    }
?>