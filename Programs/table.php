<?php 
    echo "<table cellpadding=10 border=1>";
    for($i = 1; $i <= 6; $i++){
        echo "<tr>";
        for($j = 1; $j <= 5;$j++){
            echo "<td>$i * $j =".($i * $j)."</td>";
        }
        echo "</tr>";
    }
?>