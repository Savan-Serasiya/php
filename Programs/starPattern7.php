<?php 

$k = 0;
for ($i=1; $i<=5; $i++)
{
    $k += $i;
    for ($j=1; $j<=$k; $j++)
    {   
       echo "*";
    }
        for ($z=0; $z<$i; $z++)
            {
                echo "0";
            }       
    echo "</br>"; 
}
?>
