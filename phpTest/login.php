<?php
    session_start();
   
    if(isset($_SESSION['isLogin']) && !empty($_SESSION['isLogin'])){
        header('Location: post_listing.php');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login Blog</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php 
        require_once 'controllers/login_controller.php';
    ?>
    <form action="login.php" method="POST">
        <div class="container">
            <div class="label">
                <label for="email">Email</label>
            </div>
            <div class="input">
                <input type="text" name="email" id="email">
            </div>
        </div>

        <div class="container">
            <div class="label">
                <label for="password">Password</label>
            </div>
            <div class="input">
                <input type="text" name="password" id="password">
            </div>
        </div>

        <div class="container">
            <input type="submit" value="Login" name="login">
        </div>
    </form>

    <div class="container">
        <a href="register.php">REGISTER</a>
    </div>
</body>
</html>