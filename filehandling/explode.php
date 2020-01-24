<?php 
    $fileName = 'names.txt';
    $handle = fopen($fileName, 'r');
    $datain = fread($handle, filesize($fileName));

    $namesArray = explode("\n"sibshv sdfjsdklgmsdgiolk, $datain);

    foreach($namesArray as $names){
        echo $names.'.<br>';
    }
?>