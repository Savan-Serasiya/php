<?php 
    if(isset($_POST['name'])){
        $name = $_POST['name'];
        if(!empty($name)){
            $handle = fopen('names.txt','a');
            fwrite($handle, $name."\n");
            fclose($handle);

            echo "Names in file ";
            $count = 1;
            $readin = file('names.txt');
            $reading_count = count($readin);
            
            
            foreach($readin as $names){
                echo trim($names);
                if($count!=$reading_count){
                    echo ', ';
                }
                $count++;
            }
        }else{
            echo 'Please fill fields';
        }
    }
?>

<form action="" method="POST">
    Name : <input type="text" name="name"><br><br>
    <input type="submit" value="submit">

</form>