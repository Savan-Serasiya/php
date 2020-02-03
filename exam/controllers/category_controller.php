<?php 

require_once './DBHelper/DBHelper.php';

    echo '<pre>';
        print_r($_POST);
    echo '</pre>';
    
    if(isset($_POST['category']) && !empty($_POST['category'])){
        prepareData($_POST['category']);
    }

    function prepareData($categoryData){

         
      /*  if($result != 0){
            header('Location: manage_category.php');
       } */

       $name = $_FILES['image']['name'];
       $extension = strtolower(substr($name, strpos($name, '.') + 1));
   
       $type = $_FILES['image']['type'];
       
       $tmp_name = $_FILES['image']['tmp_name'];
       $error = $_FILES['image']['error'];
   
       if(!empty($name)){
           if(($extension == 'jpg' || $extension == 'jpeg') && $type == 'image/jpeg'){
              
               $location = 'uploaded/';
               if(move_uploaded_file($tmp_name,$location.$name)){
                    $categoryData['image'] = "uploaded/$name";
                    $result = insert('category', $categoryData);
                    header('Location: manage_category.php');
               }else{
                   echo 'There was an error';
               }
   
           }
        }

       
    }


    if(isset($_POST['submit'])){
        $name = $_FILES['image']['name'];
        $extension = strtolower(substr($name, strpos($name, '.') + 1));
        $type = $_FILES['image']['type'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $error = $_FILES['image']['error'];
    
        if(!empty($name)){
            if(($extension == 'jpg' || $extension == 'jpeg') && $type == 'image/jpeg'){
                $location = 'uploaded/';
                if(move_uploaded_file($tmp_name,$location.$name)){
                    echo 'Uploaded!';
                }else{
                    echo 'There was an error';
                }
            }else{
                echo 'this file is not allowed ...';
            }
        }
    }

?>