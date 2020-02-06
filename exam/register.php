<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Register</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php 
        require_once 'controllers/register_controller.php';
    ?>
    <form action="register.php" method="post">
        <div class="container">
            <div class="label">
                <label for="prefix">Prefix</label>
            </div>
            <div class="input">
                <select name="register[prefix]" id="prefix">
                    <?php 
                        $prefix = ['Mr', 'Miss', 'Dr', 'Ms'];
                        foreach($prefix as $prefixValue):
                    ?>
                    <?php $selected = in_array(getValue('prefix'), [$prefixValue]) ? 'selected' :'';?>

                        <option value="<?= $prefixValue; ?>" <?= $selected; ?>><?= $prefixValue; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="container">
            <div class="label">
                <label for="firstName">FirstName</label>
            </div>
            <div class="input">
                <input type="text" name="register[firstName]" id="firstName" value=<?= getValue('firstName'); ?>>
            </div>
        </div>

        <div class="container">
            <div class="label">
                <label for="lastName">lastName</label>
            </div>
            <div class="input">
                <input type="text" name="register[lastName]" id="lastName" value=<?= getValue('lastName'); ?>>
            </div>
        </div>

        <div class="container">
            <div class="label">
                <label for="email">Email</label>
            </div>
            <div class="input">
                <input type="text" name="register[email]" id="email" value=<?= getValue('email'); ?>>
            </div>
        </div>

        <div class="container">
            <div class="label">
                <label for="mobile">Mobile Number</label>
            </div>
            <div class="input">
                <input type="text" name="register[mobile]" id="mobile" value=<?= getValue('mobile'); ?>>
            </div>
        </div>

        <div class="container">
            <div class="label">
                <label for="password">Password</label>
            </div>
            <div class="input">
                <input type="text" name="register[password]" id="password" value=<?= getValue('password'); ?>>
            </div>
        </div>

        <div class="container">
            <div class="label">
                <label for="confirmPassword">Confirm Password</label>
            </div>
            <div class="input">
                <input type="text" name="register[confirmPassword]" id="confirmPassword">
            </div>
        </div>

        <div class="container">
            <div class="label">
                <label for="information">Information</label>
            </div>
            <div class="input">
                <input type="text" name="register[information]" id="information" value=<?= getValue('information'); ?>>
            </div>
        </div>

        <div class="container">
            <div class="label">
            <input type="checkbox" id="terms">
            <label for="terms">Hereby, I Accept Terms & Conditions.</label>  
            </div>
        </div>

        <div class="container">
            <input type="submit" name="register_btn" value="submit">
        </div>
    </form>
</body>
</html>