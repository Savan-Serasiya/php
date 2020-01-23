<?php 

$offset = 0;
$strpos = 0;

if(isset($_POST['text']) && isset($_POST['findText']) && isset($_POST['replaceText'])){
    $text = $_POST['text'];
    $findText = $_POST['findText'];
    $replaceText = $_POST['replaceText'];
    
    $search_length = strlen($findText);

    if(!empty($text) && !empty($findText) && !empty($replaceText)){

        while($strpos = strpos($text, $findText, $offset)){
            $offset = $strpos + $search_length;
            $text = substr_replace($text, $replaceText, $strpos, $search_length);
        }

    }else{
        echo "Please fill on all fields";
    }
}

?>


<form action="index.php" method="POST">
    <textarea name="text" rows="10" cols="23"><?php if(isset($text)){echo $text;} ?></textarea><br><br>
    Search For : <br>
    <input type="text" name="findText"/><br><br>
    Replace With : <br>
    <input type="text" name="replaceText"/><br><br>

    <input type="submit" value="Find & Replace">
</form>