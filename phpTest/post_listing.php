<?php
    session_start();
    if(!isset($_SESSION['isLogin']) || empty($_SESSION['isLogin'])){
        header('Location: login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <?php 
        require_once './controllers/post_controller.php';
        require_once './DBHelper/DBHelper.php';
    ?>

    <?php
        if(isset($_GET['delete']) && !empty($_GET['delete'])){
            deleteRow('blog_post', 'postId',$_GET['delete']);
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
        <h3>Blog Posts</h3>
        <a href="add_blog_post.php">ADD POST</a>
    </div>
    

    <div class="display">
        <?php
           $result =  getPostData('blog_post', $_SESSION['isLogin']);
        ?>
        <table border="1" cellpadding="20">
            <tr>
                <th>POST ID</th>
                <th>Category Name</th>
                <th>Title</th>
                <th>Publish Date</th>
                <th colspan="2">Actions</th>
            </tr>

            <?php 
                while($row = mysqli_fetch_assoc($result)):
            ?>
                <tr>
                    <td><?= $row['postId'] ?></td>
                    <td><?= $row['category'] ?></td>
                    <td><?= $row['title'] ?></td>
                    
                    <td><?= $row['publishAt'] ?></td>
                  
                    <td>
                        <a href="?delete=<?= $row['postId'];?>">DELETE</a>
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