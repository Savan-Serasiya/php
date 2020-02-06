<?php 

require_once './DBHelper/DBHelper.php';

    if(isset($_GET['edit']) && !empty($_GET['edit'])){
        
        $_SESSION['postId'] = $_GET['edit'];
        $postId = $_SESSION['postId'];
        $postData = getDataRow('blog_post', 'postId', $postId);
        $row = mysqli_fetch_assoc($postData);
        $_POST['post'] = $row; 
        $_POST['post']['category'] = explode('_',$_POST['post']['category']); 
        
    }
    //if session is set than update else insert
    if(isset($_POST['submit']) && isset($_SESSION['postId']) && !empty($_SESSION['postId'])){
        
        $_POST['post']['category'] = implode('_', $_POST['post']['category']);
        
        $postId = $_SESSION['postId'];
    
        $name = $_FILES['image']['name'];
        $extension = strtolower(substr($name, strpos($name, '.') + 1));
    
        $type = $_FILES['image']['type'];
        
        $tmp_name = $_FILES['image']['tmp_name'];
        $error = $_FILES['image']['error'];
    
        if(!empty($name)){
            if(($extension == 'jpg' || $extension == 'jpeg') && $type == 'image/jpeg'){
                
                $location = 'uploaded/';
                if(move_uploaded_file($tmp_name,$location.$name)){
                   
                    $_POST['post']['image'] = $location.$name;
                    $where = "WHERE postId = $postId";
                    updateData('blog_post', $_POST['post'], $postId, $where);
                   
                }else{
                    echo 'There was an error';
                }
            }
         }else{
              $where = "WHERE postId = $postId";
              updateData('blog_post', $_POST['post'], $postId, $where);
         }
         unset($_SESSION['postId']);
         header('Location: post_listing.php');
       //inserting data
    }else if(isset($_POST['submit']) && !isset($_SESSION['postId']) && empty($_SESSION['postId'])){
        prepareData($_POST['post']);
    }

    //getting value in control
    function getValue($fieldName){
        return isset($_POST['post'][$fieldName]) ? $_POST['post'][$fieldName] :''; 
    }

    //cleaning data for insert
    function prepareData($postData){
        
        if(isset($postData['category']) && !empty(($postData['category']))){
            $postData['category'] = implode('_',$postData['category']);
        }

        $name = $_FILES['image']['name'];
        $extension = strtolower(substr($name, strpos($name, '.') + 1));
        $type = $_FILES['image']['type'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $error = $_FILES['image']['error'];
    
        if(!empty($name)){
            if(($extension == 'jpg' || $extension == 'jpeg') && $type == 'image/jpeg'){
               
                $location = 'uploaded/';
                if(move_uploaded_file($tmp_name,$location.$name)){
                     $postData['image'] = "uploaded/$name";
                     $postData['userId'] = $_SESSION['isLogin'];
                     $result = insert('blog_post', $postData);
                     header('Location: post_listing.php');
                }else{
                    echo 'There was an error';
                }
            }
         }else{
             echo 'Please select Image';
         }   
    }
?>