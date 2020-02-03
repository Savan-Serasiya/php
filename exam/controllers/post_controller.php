<?php 

require_once './DBHelper/DBHelper.php';

    echo '<pre>';
        print_r($_POST);
    echo '</pre>';

    if(isset($_POST['post'])){
        prepareData($_POST['post']);
    }

    function prepareData($postData){
        
        if(isset($postData['category']) && !empty(($postData['category']))){
            $postData['category'] = implode('_',$postData['category']);
        }
        
        $result = insert('blog_post', $postData);
    
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
         }

       
    }
?>