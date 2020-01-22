<?php 

    $number = 153;
    $numberCopy = $number;
    $sum = 0;
    
    for($i = 0; $number != 0; $i ++){
        $reminder = $number % 10;
        $sum += ($reminder * $reminder * $reminder);
        $number /= 10;
    }

    if($sum === $numberCopy){
        echo "$numberCopy is armstrong number";
    }else{
        echo "$numberCopy is not armstrong number";
    }


?>