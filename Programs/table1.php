<?php 
    echo "<table cellpadding=10 border=1>";
    for($i = 1; $i <= 10; $i++){
        echo "<tr>";
        for($j = 1; $j <= 10;$j++){
            echo "<td>".($i * $j)."</td>";
        }
        echo "</tr>";
    }
?>