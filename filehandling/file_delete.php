<?php 

$fileName = 'file.txt';
if(file_exists($fileName)){
    if(unlink($fileName)){
        echo "File <strong> $fileName </strong> has been deleted.";
    }else{
        echo "File cannot be deleted.";
    }
}else{
    echo 'File not exist.';
}

?>