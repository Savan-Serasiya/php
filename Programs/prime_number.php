<?php 
    $number = 7;
    $isPrime = true;
    for($i = 2; $i < $number; $i++){
        if($number % $i == 0){
            $isPrime = false;
            break;
        }
    }

    if($isPrime){
        echo "$number is prime number";
    }else{
        echo "$number is not prime numbber";
    }
?>