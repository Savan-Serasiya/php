<?php 
   $ip_address = $_SERVER['REMOTE_ADDR'];
    
    function hit_count(){
        global $ip_address;
        $ip_file = file('ip.txt');
        foreach($ip_file as $ip){
            $ip_single = trim($ip);
            if($ip_address == $ip_single){
                $found = true;
                break;
            }else{
                $found = false;
            }
        }
        if($found == false){
            $fileName = 'count.txt';
            $handle = fopen($fileName, 'r');
            $current = fread($handle, filesize($fileName));
            fclose($handle);

            $current_inc = $current + 1;

            $handle = fopen($fileName, 'w');
            fwrite($handle, $current_inc);
            fclose($handle);

            $handle = fopen('ip.txt', 'a');
            fwrite($handle, $ip_address."\n");
            fclose($handle);
        }
    }
?>