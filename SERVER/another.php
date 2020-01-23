<?php 
    include 'header.php';
    
    if(isset($_POST['submit'])){
        echo $_SERVER['SCRIPT_NAME'];
    }
?>