<?php
    session_start();
    if(!isset($_SESSION['isLogin']) || empty($_SESSION['isLogin'])){
        header('Location: login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<?php
    require_once './DBHelper/DBHelper.php';

    
?>

<?php
        if(isset($_GET['delete']) && !empty($_GET['delete'])){
            deleteRow('category', 'categoryId',$_GET['delete']);
        }
    ?>
<div class="nav">
        <ul>
            <li>
                <a href="manage_category.php">Manage Category</a>
            </li>
    
            <li>
                <a href="register.php?userId=<?= $_SESSION['isLogin'];?>">My Profile</a>
            </li>
    
            <li>
                <a href="logout.php">Logout</a>
            </li>
        </ul>
    </div>

    <div>
        <h3>Blog Category</h3>
        <a href="add_category.php">ADD CATEGORY</a>
    </div>

    <div class="display">
        <?php
           $result = getDatas('category');
        ?>
        <table border="1" cellpadding="20">
            <tr>
                <th>Category ID</th>
                <th>Category Image</th>
                <th>Category Name</th>
                <th>Created Date</th>
                <th colspan="2">Actions</th>
            </tr>

            <?php 
                while($row = mysqli_fetch_assoc($result)):
            ?>
                <tr>
                    <td><?= $row['categoryId'] ?></td>
                    <td><img src="<?= $row['image'] ?>" width="50" height="50"></td>
                    <td><?= $row['title'] ?></td>
                    <td><?= $row['createdDate'] ?></td>
                    
                    <td>
                        <a href="?delete=<?= $row['categoryId'];?>">DELETE</a>
                    </td>

                    <td>
                        <a href="">EDIT</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>

</body>
</html>