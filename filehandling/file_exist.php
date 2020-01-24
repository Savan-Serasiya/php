<?php 
$fileName = 'file.txt';

if(file_exists($fileName)){
    echo 'File Already exists';
}else{
    $handle = fopen($fileName, 'w');
    fwrite($handle, 'Hello world!');
    fclose($handle);
}


?>