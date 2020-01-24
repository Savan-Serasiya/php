<?php 
if(isset($_POST['submit'])){
    $name = $_FILES['file']['name'];
    $extension = strtolower(substr($name, strpos($name, '.') + 1));
    echo $extension;
    $size = $_FILES['file']['size'];
    $max_size = 100000;

    $type = $_FILES['file']['type'];
    
    $tmp_name = $_FILES['file']['tmp_name'];
    $error = $_FILES['file']['error'];

    if(!empty($name)){
        if(($extension == 'jpg' || $extension == 'jpeg') && $type == 'image/jpeg' && $size <= $max_size){
           
            $location = 'uploads/';
            if(move_uploaded_file($tmp_name,$location.$name)){
                echo 'Uploaded!';
            }else{
                echo 'There was an error';
            }

        }else{
            echo 'this file is not allowed ...';
        }
    }
}

?>
<form action="" method="POST" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="submit" name="submit" value="Submit">
</form>