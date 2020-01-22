<?php

$str= "JOHN";
$str2 = "SMITH";
$a = str_split($str);
print_r($a);
$a2 = str_split($str2);
print_r($a2);

$j = 0;
for($i = 0; $i <= 9; $i++){
    if($i % 2 !== 0 && $i > 0){
        array_splice($a, $i, 0, $a2[$j]);
        $j++;
    }
}

echo $str_new = implode('',$a);
echo '<br/>';
?>