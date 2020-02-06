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
    
    require_once './controllers/category_controller.php';
    require_once './DBHelper/DBHelper.php';

   ?>
    <form action="add_category.php" method="POST" enctype="multipart/form-data">
    <div class="container">
            <div class="label">
                <label for="title">Title</label>
            </div>
            <div class="input">
                <input type="text" name="category[title]" id="title" value="<?= getValue('title'); ?>">
            </div>
        </div>

        <div class="container">
            <div class="label">
                <label for="content">Content</label>
            </div>
            <div class="input">
                <textarea name="category[content]" id="content" cols="30" rows="10"><?= getValue('content'); ?></textarea>
            </div>
        </div>

        <div class="container">
            <div class="label">
                <label for="url">URL</label>
            </div>
            <div class="input">
                <input type="text" name="category[url]" id="url" value="<?= getValue('url'); ?>">
            </div>
        </div>

        <div class="container">
            <div class="label">
                <label for="metaTitle">Meta Title</label>
            </div>
            <div class="input">
                <input type="text" name="category[metaTitle]" id="metaTitle" value="<?= getValue('metaTitle'); ?>">
            </div>
        </div>

        <?php 
            $result = getDatas('parentcategory');
        ?>

        <div class="container">
            <div class="label">
                <label for="parentCategory">Parent Category</label>
            </div>
            <div class="input">
                <select name="category[parentCategory]">
                    <?php 
                        while($row = mysqli_fetch_assoc($result)):
                    ?>
                    <?php $selected = in_array(getValue('parentCategory'), [$row['parentCategoryId']]) ? 'Selected':''; ?>
                        <option value="<?= $row['parentCategoryId'];?>" <?= $selected; ?>>
                            <?= $row['parentCategoryTitle'];?>
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
            <input type="submit" value="submit" name="submit">
        </div>
    </form>
</body>
</html>