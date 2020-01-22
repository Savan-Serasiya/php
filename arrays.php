<?php 
    $food = array('Pasta', 'Pizza', 'Salad', 'Vagetable');
    print_r($food);

    $food[4] = 'Fruit';
    print_r($food);   

    $fruits = array (
        "fruits"  => array("a" => "orange", "b" => "banana", "c" => "apple"),
        "numbers" => array(1, 2, 3, 4, 5, 6),
        "holes"   => array("first", 5 => "second", "third")
    );

    echo $fruits['holes'][5];

    
?>