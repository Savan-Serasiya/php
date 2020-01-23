<?php 
$match = 'pass123';
if(isset($_POST['password'])){
    $password = $_POST['password'];
    if(!empty($password)){
        if($password===$match){
            echo 'OK';
        }else{
            echo 'Wrong Password';
        }
    }else{
        echo "Please fill password field";
    }
}

?>


<form action="" method="POST">
    Pasword : <input type="password" name="password"><br>
    <input type="submit" value="Submit">
</form>