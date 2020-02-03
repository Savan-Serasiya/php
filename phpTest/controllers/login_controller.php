<?php 
    require_once './DBHelper/DBHelper.php';

    if(isset($_POST['login'])){
        if(!isset($_POST['email']) || empty($_POST['email'])){
            echo 'Please Enter Email Address';
        }else if(!isset($_POST['password']) || empty($_POST['password'])){
            echo 'Please Enter Password';
        }else{
            $userData = loginGet($_POST['email'], $_POST['password']);
            $_SESSION['isLogin'] = $userData['userId'];
            header('Location: post_listing.php');
        }
    }
?>