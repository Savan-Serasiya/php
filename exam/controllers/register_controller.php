<?php 
    require_once './DBHelper/DBHelper.php';
    //fetch data for update
    if(isset($_GET['userId']) && !empty($_GET['userId'])){
           
           $_SESSION['userId'] = $_GET['userId'];
           $userId = $_SESSION['userId'];
           $userData = getDataRow('user', 'userId', $userId);
           $row = mysqli_fetch_assoc($userData);
           $_POST['register'] = $row; 
    }

    //update data in database
    if(isset($_POST['register_btn']) && isset($_SESSION['userId']) && !empty($_SESSION['userId'])){
        
        unset($_POST['register']['userId']); 
        unset($_POST['register']['confirmPassword']);
        $userId = $_SESSION['userId'];
        $where = "WHERE userId = '$userId'";
        updateData('user', $_POST['register'], $userId, $where);
        unset($_SESSION['userId']);
        header('Location: post_listing.php');
        
        //insert data
    }else if(isset($_POST['register_btn']) && !isset($_SESSION['userId']) && empty($_SESSION['userId'])){
        prepareData($_POST['register']);
    }

    function prepareData($registerData){
        unset($registerData['confirmPassword']);
        $result = insert('user',$registerData);
        if($result != 0){
            header('Location: login.php');
        }
    }

    function getValue($fieldName){
        return isset($_POST['register'][$fieldName]) ? $_POST['register'][$fieldName] :''; 
    }
?>