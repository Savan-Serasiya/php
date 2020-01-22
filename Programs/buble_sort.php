<?php 
    $numbers  = [10,5,4,78,45,69,20];
    for($i = 0; $i < count($numbers); $i++){
        for($j = 0; $j < count($numbers); $j++ ){
            if($numbers[$i] > $numbers[$j]){
                $temp = $numbers[$i];
                $numbers[$i] = $numbers[$j];
                $numbers[$j] = $temp;
            }
        }
        #print_r($numbers);
    }
    print_r($numbers);
?>