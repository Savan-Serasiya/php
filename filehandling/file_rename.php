<?php 

    $fileName = 'file.txt';
    $newName = 'renamed.txt';
    if(rename($fileName, $newName)){
        echo "File $fileName has been renamed with $newName name";
    }else{
        echo "Error Renaming";
    }

?>