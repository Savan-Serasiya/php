<?php 
    function add($number1,$number2){
        echo $number1 + $number2;
    }
    add(10,20);

    function stringNumber($str,$number){
        echo $str . $number;
    }

    function defaultValue($str='hi',$str1='hello'){
        echo $str.$str1;
    }

    defaultValue();

    stringNumber('Hello',20);
?>