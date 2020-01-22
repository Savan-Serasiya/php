<?php 
$temp = 1;
    for($i = 1; $i < 4; $i++){
        
        for($j = 1; $j < 4; $j++){
            echo $temp;
            $temp += 4;
        }
        $temp = $i + 1;
        echo "<br>";
    }
?>