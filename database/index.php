<?php

    require 'connection.php';
    
?> 

<form action="index.php" method = "GET">
    <select name="uh">
        <option value="h">Healthy</option>
        <option value="u">Unhealthy</option>
    </select>
    <br><br>
    <input type="submit" value="submit" >

</form>
<?php 

    if(isset($_GET['uh']) && !empty($_GET['uh'])){

        $uh = strtolower($_GET['uh']);
        if($uh == 'u' || $uh == 'h'){
            
            $query = "SELECT `food`, `calories` FROM `food` WHERE `healthy_unhealthy` = '$uh' ORDER BY `id`";
            $query_run = mysqli_query($conn, $query);
    
            if($query_run = mysqli_query($conn, $query)){
    
                if(mysqli_num_rows($query_run) == NULL){
                        echo 'No Results Founds!';
                }else{
                    while( $query_row = mysqli_fetch_assoc($query_run)){
                        $food = $query_row['food'];
                        $calories = $query_row['calories'];
                        echo $food.' has '.$calories.' calories.<br>';
                    }
                }
            }
        }
    }else{
        echo mysqli_error($conn);
    }
?>