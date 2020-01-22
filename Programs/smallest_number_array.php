<?php 
    $numbersArray = array(150,200,500,700,800,900,250);
    $smallestNumber = $numbersArray[0];
    
    for($i = 1; $i < count($numbersArray); $i++){
        if($numbersArray[$i] < $smallestNumber){
            $smallestNumber = $numbersArray[$i];
        }
    }
    echo $smallestNumber;
?>