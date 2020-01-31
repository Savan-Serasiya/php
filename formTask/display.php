<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>

<?php 
    include 'connection.php';
?>

<?php
     if(isset($_GET['Delete']) && !empty($_GET['Delete'])){
        deleteRow('customers', $_GET['Delete']);
    }
?>

<table border="1" cellpadding="20">
    <th>CustomerId</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Company</th>
    <th>City</th>
    <th>Hobbies</th>
    <th colspan="2">Actions</th>

<?php
    $result = fetchJoin();
    while($row = mysqli_fetch_assoc($result)) : 
?>
    <tr>
        <td><?= $row['customerId'] ?></td>
        <td><?= $row['firstName'] ?></td>
        <td><?= $row['lastName'] ?></td>
        <td><?= $row['company'] ?></td>
        <td><?= $row['city'] ?></td>
        <td><?= $row['hobbies'] ?></td>
        <td>
            <a href="?Delete=<?= $row['customerId']; ?>">DELETE</a>
        </td>
        <td>
            <a href="form.php?Edit=<?= $row['customerId']; ?>">EDIT</a>
        </td>
    </tr>

<?php endwhile; ?>
</table>
    
</body>
</html>