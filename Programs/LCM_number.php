<?php 
    $number1 = 7;
    $number2 = 99;
    $hcf = 0;

    for($i = 1; $i <= $number1 && $i <= $number2; $i++){
        if($number1 % $i == 0 && $number2 % $i == 0){
            $hcf = $i; 
        }
    }

    echo "LCM of $number1 and $number2 is ".($number1 * $number2)/$hcf;
?>