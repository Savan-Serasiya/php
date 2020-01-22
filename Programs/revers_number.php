<?php 
    $number = 123;
    $reversNumber = 0;
    for($i = 0; $number >= 1; $i++){
        $rem = $number % 10;
        $reversNumber = ($reversNumber  * 10) + $rem;
        $number /= 10;
    }

    echo $reversNumber;
?>
