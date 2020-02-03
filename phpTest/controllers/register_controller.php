<?php 
    require_once './DBHelper/DBHelper.php';
 
    if(isset($_POST['register_btn']) && !empty($_POST['register'])){
        prepareData($_POST['register']);
    }

    if(isset($_GET['userId']) && !empty($_GET['userId'])){
           $userId = $_GET['userId'];
           
    }

    function prepareData($registerData){
        unset($registerData['confirmPassword']);
        
        $result = insert('user',$registerData);
        if($result != 0){
            header('Location: login.php');
        }
    }

    function getRow($userId){
        
    }

?>