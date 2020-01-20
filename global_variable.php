<?php 
    $user_ip = $_SERVER['REMOTE_ADDR'];

    function echo_ip(){
        global $user_ip;
        $string = 'Your IP Address is: '.$GLOBALS['user_ip'];
        $string1 = '<br>Your IP Address is: '.$user_ip;
        echo $string;
        echo $string1;
    }

    echo_ip();

?>