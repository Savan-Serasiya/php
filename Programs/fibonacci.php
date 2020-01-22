<?php 

    $a = 0;
    $b = 1;
    echo "$a <br> $b";
    for($i = 0; $i < 10; $i++){
        $sum = $a + $b;
        echo "<br>$sum";
        
        $a = $b;
        $b = $sum;


    }

?>