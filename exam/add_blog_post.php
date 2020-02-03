<?php
    session_start();
    if(!isset($_SESSION['isLogin']) || empty($_SESSION['isLogin'])){
        header('Location: login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>ADD BLOG POST</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<?php 
    require_once './controllers/post_controller.php';
    require_once './DBHelper/DBHelper.php';
?>
    <form action="add_blog_post.php" method="POST" enctype= "multipart/form-data">

        <div class="container">
            <div class="label">
                <label for="title">Title</label>
            </div>
            <div class="input">
                <input type="text" name="post[title]" id="title">
            </div>

            <div class="container">
                <div class="label">
                    <label for="content">Content</label>
                </div>
                <div class="input">
                    <textarea name="post[content]" id="content" cols="30" rows="10"></textarea>
                </div>
            </div>

            <div class="container">
                <div class="label">
                    <label for="url">URL</label>
                </div>
                <div class="input">
                    <input type="text" name="post[url]" id="url">
                </div>
            </div>

            <div class="container">
                <div class="label">
                    <label for="publishAt">Publish At</label>
                </div>
                <div class="input">
                    <input type="date" name="post[publishAt]" id="publishAt">
                </div>
            </div>
            <?php 
                $result = getDatas('category');
            ?>
            <div class="container">
                <div class="label">
                    <label for="category">Category</label>
                </div>
                <div class="input">
                    <select name="post[category][]" id="category" multiple>
                        <?php 
                            while($row = mysqli_fetch_assoc($result)):
                        ?>
                            <option value="<?= $row['title'] ?>">
                                <?= $row['title'] ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>
            </div>

            <div class="container">
                <div class="label">
                    <label for="image">Image</label>
                </div>
                <div class="input">
                    <input type="file" name="image" id="image">
                </div>
            </div>
            
            <div class="container">
                <input type="submit" name="submit" value="submit">
            </div>
        </div>
    </form>
</body>

</html>