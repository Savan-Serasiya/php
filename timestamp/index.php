<?php 

$time = time();
$time_now = date('d M Y  @ H:i:s',$time);
$time_modified = date('d M Y @ H:i:s', strtotime('-1 week'));

    echo "the time now is : $time_now <br> the modified time is : $time_modified";
?>