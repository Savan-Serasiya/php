<?php 
    $number1 = 1500;
    $number2 = 2000;
    $hcf = 0;

    for($i = 1; $i <= $number1 && $i <= $number2; $i++){
        if($number1 % $i == 0 && $number2 % $i == 0){
            $hcf = $i; 
        }
    }

    echo "HCF of $number1 and $number2 is: ".$hcf;
?>