<?php 
    $number = 4;

    function factorial($number){
        if($number != 1){
            $number = $number * factorial($number-1);
        }
        return $number;
    }
    echo factorial($number);
?>