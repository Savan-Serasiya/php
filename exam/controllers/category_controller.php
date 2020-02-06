<?php 

require_once './DBHelper/DBHelper.php';
    if(isset($_GET['edit']) && !empty($_GET['edit'])){
        
        $_SESSION['categoryId'] = $_GET['edit'];
        $categoryId = $_SESSION['categoryId'];
        $result = getDataRow('category', 'categoryId', $categoryId);
        $row = mysqli_fetch_assoc($result);
        $_POST['category'] = $row;
       
    
    }

    if(isset($_POST['submit']) && isset($_SESSION['categoryId']) && !empty($_SESSION['categoryId'])){
        $categoryId = $_SESSION['categoryId'];
        //header('Location: manage_category.php');

        $name = $_FILES['image']['name'];
        $extension = strtolower(substr($name, strpos($name, '.') + 1));
    
        $type = $_FILES['image']['type'];
        
        $tmp_name = $_FILES['image']['tmp_name'];
        $error = $_FILES['image']['error'];
    
        if(!empty($name)){
            if(($extension == 'jpg' || $extension == 'jpeg') && $type == 'image/jpeg'){
                
                $location = 'uploaded/';
                if(move_uploaded_file($tmp_name,$location.$name)){
                   
                    $_POST['category']['image'] = $location.$name;
                    $where = "WHERE categoryId = '$categoryId'";
                    updateData('category', $_POST['category'], $categoryId, $where);   
                    
                }else{
                    echo 'There was an error';
                }
            }
         }else{
              
            $where = "WHERE categoryId = '$categoryId'";
            updateData('category', $_POST['category'], $categoryId, $where);
            
        }
        unset($_SESSION['categoryId']);
        header('Location: manage_category.php');

    }else if(isset($_POST['submit']) && !isset($_SESSION['categoryId']) && empty($_SESSION['categoryId'])){
        
        prepareData($_POST['category']);
    }

    function getValue($fieldName){
        return isset($_POST['category'][$fieldName]) ? $_POST['category'][$fieldName] :'';
    }

    function prepareData($categoryData){

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
        }else{
            echo 'Please Select image';
        }  
    }
?>