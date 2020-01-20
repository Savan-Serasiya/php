<?php 
    //str_word_count
    $string = 'This is an example string.';
    $count = str_word_count($string, 0);
    echo $count.'<br>';

    $count = str_word_count($string, 1);
    print_r($count);
    echo '<br>';

    $count = str_word_count($string, 2, '.');
    print_r($count);
    echo '<br>';

    //explode
    $pizza = 'piece1 piece2 piece3 piece4 piece5';
    $pieces = explode(' ', $pizza);
    print_r($pieces);
    echo '<br>';

    //implode
    $str = implode(',', $pieces);
    echo $str;
    echo '<br>';

    //str_shuffle
    echo substr(str_shuffle($string), 0, strlen($string)/2); 

    //strrev
    echo '<br>'.strrev($string).'<br>';

    //similar_text
    $string_one = 'hello my name is savan';
    $string_two = 'HELLO MY NAME IS SAVAN';

    similar_text($string_one, $string_two, $result);
    echo 'The similarity betweeen is : '.$result.'%<br>';

    //strlen
    echo 'strlen() = '.strlen($string);
    
    //str_replace 
    echo '<br>'.str_replace('This','There',$string);

    //str_split
    print_r(str_split($string,2));

    //trim
    $text   = "\t\t\tThese are a few words :) ...  ";
    $binary = "\x09Example string\x0A";
    $hello  = "Hello World";

    var_dump($text, $binary, $hello);

    $trimmed = trim($text);
    var_dump($trimmed);

    $trimmed = trim($binary);
    var_dump($trimmed);

    $trimmed = trim($hello);
    var_dump($trimmed);


    $str = '<input type="text">';

    // Outputs an empty string
    //echo htmlentities($str, ENT_QUOTES, "UTF-8");

    // Outputs "!!!"
    echo html_entity_decode(htmlentities(addslashes($str)));
?>