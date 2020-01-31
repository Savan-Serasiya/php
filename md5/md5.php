<?php 

if(isset($_POST['password']) && !empty($_POST['password'])){
    $password = md5($_POST['password']);
    $fileName = 'hash.txt';
    $handle = fopen($fileName, 'r');
    $file_password = fread($handle, filesize($fileName));

    if($password == $file_password){
        echo 'OK';
    }else{
        echo 'Incorrect Password';
    }
}else{
    echo 'Please Enter Password';
}

?>

<form action="md5.php" method="POST">
    <input type="text" name="password">
    <input type="submit" name="submit" value="submit">
</form>