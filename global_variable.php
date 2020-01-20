<?php 
    $user_ip = $_SERVER['REMOTE_ADDR'];

    function echo_ip(){
        global $user_ip;
        $user_ip = 123;
        $string = 'Your IP Address is: '.$user_ip;
        echo $string;
    }

    echo $user_ip;

    echo_ip();
?>