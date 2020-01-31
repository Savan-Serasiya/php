<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
<?php
    require 'DemoConnection.php';
?>
<?php 
    if(isset($_POST['customerName']) && isset($_POST['phoneNumber'])){
        $customerName = $_POST['customerName'];
        $phoneNumber = $_POST['phoneNumber'];
        if(!empty($_POST['customerName']) && !empty($_POST['phoneNumber'])){
           $result = insert($customerName, $phoneNumber);
            echo "Total $result rows inserted";
        }else{
            echo 'Fill all fields..';
        }
    }

    if(isset($_POST['deleteAll'])){
       $result = deleteAll('customer');
       echo "Total $result rows Deleted";
    }

    if(isset($_GET['forDelete']) && !empty($_GET['forDelete'])){
        echo deleteOne('customer', $_GET['forDelete']).' Row is deleted';
    }

    $result = columnCount('customer');
    echo 'Total Columns in Tabel '.$result;
?>

<form action="display.php" method="POST">
    Customer Name : <input type="text" name="customerName"><br><br>
    Phone Number : <input type="text" name="phoneNumber"><br><br>
    <input type="submit" name="submit" value="Submit">
    <input type="submit" value="DELETE ALL" name="deleteAll">
</form>
<br><br>
<table border="1">
    <tr>
        <th>Customer ID</th>
        <th>Customer Name</th>
        <th>Phone Number</th>
        <th>Action</th>
    </tr>
    <?php
        $result = fetchAll('customer');
        //print_r($result);
        while($row = mysqli_fetch_assoc($result)) :
    ?>
    
    <tr>
        <td><?= $row['customerId']; ?></td>
        <td><?= $row['customerName']; ?></td>
        <td><?= $row['phoneNumber']; ?></td>
        <td>
            <a href="?forDelete=<?php echo $row['customerId']; ?>">DELETE</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>
</body>
</html>