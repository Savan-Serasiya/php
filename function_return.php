<?php 
    function add($number1,$number2){
        return $number1 + $number2;
    }

    function subtraction($number1,$number2){
        return $number1 - $number2;
    }

    function divide($number1,$number2){
            return $number1 / $number2;
    }

    echo divide(add(10,10), add(5,5));
    echo subtraction(20,10);

?>