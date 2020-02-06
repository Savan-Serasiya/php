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
                <input type="text" name="post[title]" id="title" value="<?= getValue('title'); ?>">
            </div>

            <div class="container">
                <div class="label">
                    <label for="content">Content</label>
                </div>
                <div class="input">
                    <textarea name="post[content]" id="content" cols="30" rows="10"><?= getValue('content'); ?></textarea>
                </div>
            </div>

            <div class="container">
                <div class="label">
                    <label for="url">URL</label>
                </div>
                <div class="input">
                    <input type="text" name="post[url]" id="url" value="<?= getValue('url'); ?>">
                </div>
            </div>

            <div class="container">
                <div class="label">
                    <label for="publishAt">Publish At</label>
                </div>
                <div class="input">
                    <input type="date" name="post[publishAt]" id="publishAt" value="<?= getValue('publishAt'); ?>">
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
                        <?php 
                            $selected = array_intersect(getValue('category'),[$row['title']]) ? 'selected' : '';
                        ?>
                            <option value="<?= $row['title'] ?>" <?= $selected; ?>>
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
                    <input type="file" name="image" id="image" value="<?= getValue('image'); ?>">
                </div>
            </div>
            
            <div class="container">
                <input type="submit" name="submit" value="submit">
            </div>
        </div>
    </form>
</body>

</html>