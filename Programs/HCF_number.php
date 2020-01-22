<?php 
    $number1 = 10;
    $number2 = 0;
    $hcf = 0;

    for($i = 1; $i <= $number1 && $i <= $number2; $i++){
        if($number1 % $i == 0 && $number2 % $i == 0){
            $hcf = $i; 
        }
    }

    echo $hcf;
?>