<?php 
session_start();
if(isset($_SESSION['userName'])){
    echo 'Welcome, '.$_SESSION['userName'];

}else{
    echo "<script>alert('Please Login');</script>";
    header('Location: set.php');
}
?>