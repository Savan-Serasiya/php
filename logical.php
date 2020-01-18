<?php 
    $number = 51;
    $lower = 100;
    $upper = 1000;

    if($number >= $lower && $number <= $upper){
        echo 'Ok.';
    }else{
        echo "Number between $lower and $upper";
    }   

    $number = 2;
    $lower = 2;
    $upper = 4;

    if($number >= $lower || $number <= $upper){
        echo 'Ok.';
    }
?>