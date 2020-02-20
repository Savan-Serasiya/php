<?php 
    
    namespace App\Controller\Admin;
    use \Core\View;
    use \App\Model\CategoriesModel;

    class Categories extends \Core\Controller{

        public function index()
        {
           $categories = CategoriesModel::selectAllCategory();
           View::renderTemplate('Categories\ViewCategory.html', ["categories" => $categories]);
        }

        public function addEditCategory(){
            $result = CategoriesModel::selectAllParentCategory();
            View::renderTemplate('Categories\AddEditCategory.html', ["parentCategories" => $result]);
        }

        public function insertCategory(){
            extract($_POST);
            $name = $_FILES['image']['name'];
            $tmp_name = $_FILES['image']['tmp_name'];
            
            $location = '../public/uploads/';

            if(move_uploaded_file($tmp_name,$location.$name)){
                echo 'Uploaded!';
            }

            $path = $location.$name;
            echo $path;

            $query = "INSERT INTO categories(categoryName, urlKey, image, status, description, parentCategory) VALUES('$categoryName', '$urlKey','$path', '$status', '$description', '$parentCategory')";
            echo $query;
            
            $result = CategoriesModel::insert($query);
           header('Location: index');   
        }

        public function delete(){
                $id = $this -> route_params['id'];
                $query = "DELETE FROM categories WHERE categoryId = '$id'";
                $result = CategoriesModel::delete($query);
                header('Location: ../index');
        }

        public function edit(){
          
            $result1 = CategoriesModel::selectAllParentCategory();
            print_r($result1);
                 
            $id = $this -> route_params['id'];
            $query = "SELECT * FROM categories WHERE categoryId = $id";
            //echo $query;

            $category = CategoriesModel::getRow($query);
            

            View::renderTemplate('Categories\AddEditCategory.html', ["edit" => "edit", "category" => $category,  "parentCategories" => $result1]);
        }

        public function update(){
            extract($_POST);
            $id = $categoryId;

            $query = "UPDATE categories SET categoryName = '$categoryName', urlKey = '$urlKey', status = '$status', description = '$description', parentCategory = '$parentCategory' WHERE categoryId = '$id'";
            CategoriesModel::update($query);
            //echo $query;
            header('Location: index');
        }
    }
?>