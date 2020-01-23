<?php 
    echo '<b>Script Name:</b>'.$_SERVER['SCRIPT_NAME'];
    echo '<br><b>Host Name: </b>'.$_SERVER['HTTP_HOST'];
    echo '<br><b>IP Address: </b>'.$_SERVER['REMOTE_ADDR'];
    echo '<br><b>IP Address: </b>'.$_SERVER['REMOTE_ADDR'];
    echo '<br>';
    
    $browser = get_browser(null, true);   
    if($browser['browser']==='Chrome'){
        echo 'chrome';
    }

?>