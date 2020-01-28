<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registration Form</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
    <?php require_once 'form_post.php'; ?>
    <form action="form.php" method="POST">
        <fieldset>
            <legend>ACCOUNT INFORMATION</legend>
            <div class="account-prefix">
                <?php $prefixData = ['Mr','Miss','Ms']; ?>
                <select name="account[prefix]">
                    <?php foreach($prefixData as $prefix) : ?>
                    <?php $selected = (in_array(getValue('account', 'prefix'), [$prefix])) ? 'selected' : ''; ?>
                    <option value="<?php echo $prefix; ?>" <?php echo $selected; ?>><?php echo $prefix; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="account-firstName">
                <label>Firstname</label>
                <input type="text" name="account[firstName]" value="<?php echo getValue('account', 'firstName'); ?>">
                <?php if(!isValidate('account', 'firstName')): ?>
                    <label>Firstname is Required...</label>
                <?php endif; ?>
            </div>

            <div class="account-lastName">
                <label>Lastname</label>
                <input type="text" name="account[lastName]" value="<?php echo getValue('account', 'lastName'); ?>">
                <?php if(!isValidate('account', 'lastName')): ?>
                    <label>Lastname is Required...</label>
                <?php endif; ?>
            </div>

            <div class="account-dateOfBirth">
                <label>Date of Birth</label>
                <input type="text" name="account[dateOfBirth]" value="<?php echo getValue('account', 'dateOfBirth'); ?>">
                <?php if(!isValidate('account', 'dateOfBirth')): ?>
                    <label>Date Of Birth is Required...</label>
                <?php endif; ?>
            </div>

            <div class="account-phoneNumber">
                <label>Phone Number</label>
                <input type="text" name="account[phoneNumber]"
                    value="<?php echo getValue('account', 'phoneNumber'); ?>">
                    <?php if(!isValidate('account', 'phoneNumber')): ?>
                    <label>PhoneNumber is Required...</label>
                <?php endif; ?>
            </div>

            <div class="account-email">
                <label>Email Address</label>
                <input type="text" name="account[emailAddress]"
                    value="<?php echo getValue('account', 'emailAddress'); ?>">
                    <?php if(!isValidate('account', 'emailAddress')): ?>
                    <label>Email Address is Required...</label>
                <?php endif; ?>
            </div>

            <div class="account-password">
                <label>Password</label>
                <input type="password" name="account[password]" value="<?php echo getValue('account', 'password'); ?>">
                <?php if(!isValidate('account', 'password')): ?>
                    <label>Password is Required...</label>
                <?php endif; ?>
            </div>

            <div class="account-confirmPassword">
                <label>Confirm Password</label>
                <input type="password" name="account[confirmPassword]" value="<?php echo getValue('account', 'confirmPassword'); ?>">
                <?php if(!isValidate('account', 'confirmPassword')): ?>
                    <label>Confirm is Required...</label>
                <?php endif; ?>
            </div>
        </fieldset>

        <fieldset>
            <legend>ADDRESS INFORMATION</legend>
            <div class="address-addressLineOne">
                <label>Address Line 1</label>
                <textarea rows="5" cols="30" name="address[addressLineOne]"><?php echo getValue('address', 'addressLineOne'); ?></textarea>
            </div>

            <div class="address-addressLineTwo">
                <label>Address Line 2</label>
                <textarea rows="5" cols="30" name="address[addressLineTwo]"><?php echo getValue('address', 'addressLineTwo'); ?></textarea>
            </div>

            <div class="address-company">
                <label>Company</label>
                <input type="text" name="address[company]" value="<?php echo getValue('address','company'); ?>">
            </div>

            <div class="address-city">
                <label>City</label>
                <input type="text" name="address[city]" value="<?php echo getValue('address','city'); ?>">
            </div>

            <div class="address-state">
                <label>State</label>
                <input type="text" name="address[state]" value="<?php echo getValue('address','state'); ?>">
            </div>

            <div class="address-country">
                <label>Country</label>
                <?php $countryData = ['India','Pakistan','Chaina']; ?>
                <select name="address[country]">

                    <?php foreach($countryData as $country) : ?>
                    <?php $selected = (in_array(getValue('address', 'country'), [$country])) ? 'selected' : ''; ?>
                    <option value="<?php echo $country; ?>" <?php echo $selected; ?>><?php echo $country; ?></option>
                    <?php endforeach; ?>

                </select>
            </div>

            <div class="address-postalCode">
                <label>Postal Code</label>
                <input type="text" name="address[postalCode]" value="<?php echo getValue('address', 'postalCode'); ?>">
            </div>

        </fieldset>
        <input type="checkbox" id="checkboxOther" name="checkboxOther"> Other Information
        <fieldset id="otherInformation">
            <legend>OTHER INFORMATION</legend>

            <div class="other-aboutYourself">
                <label>Describe Yourself</label>
                <textarea name="other[aboutYourself]" cols="30" rows="5"><?php echo getValue('other', 'aboutYourself'); ?></textarea>
            </div>

            <div class="other-profilePicture">
                <label>Profile Picture</label>
                <input type="file" name="other[profilePicture]">
            </div>

            <div class="other-certificate">
                <label>Upload Certificate</label>
                <input type="file" name="other[certificate]">
            </div>

            <div class="other-inBusiness">
                How long have you been in business?<br>
                <?php $inBusinessData = ['uner 1 year', '1-2 years', '2-5 years', '5-10 years', 'over 10 years'] ?>
                <?php foreach($inBusinessData as $inBusiness) : ?>
                <?php $selected = (in_array(getValue('other', 'yearInBusiness'),[$inBusiness])) ? 'checked' : ''; ?>
                <input type="radio" name="other[yearInBusiness]" value="<?php echo $inBusiness; ?>" <?php echo $selected; ?>><?php echo $inBusiness; ?>
                <?php endforeach; ?>
            </div>

            <div class="other-uniqueClients">
                Number of unique clients you see each week?
                <select name="other[uniqueClients]">
                    <?php $uniqueClientsData = ['1-5', '6-10', '11-15', '15+']; ?>
                    <?php foreach($uniqueClientsData as $uniqueClients) : ?>
                    <?php $selected = (in_array(getValue('other', 'uniqueClients'),[$uniqueClients])) ? 'selected' : ''; ?>
                    <option value="<?php echo $uniqueClients; ?>" <?php echo $selected; ?>><?php echo $uniqueClients; ?></option>
                    <?php endforeach; ?>
                </select>
                <br><br>
            </div>

            <div class="other-getInTouch">
                How do you like us to get in touch with you?
                <?php $inTouchData = ['POST', 'Email', 'SMS', 'Phone']; ?>
                <?php foreach($inTouchData as $inTouch) : ?>
                    <?php $selected = (@array_intersect(getValue('other','inTouch'),[$inTouch])) ? 'checked' : ''; ?>
                <input type="checkbox" name="other[inTouch][]" value="<?php echo $inTouch; ?>" <?php echo $selected; ?>><?php echo $inTouch; ?>
                <?php endforeach; ?>
            </div>

            <div class="other-hobbies">
                hobbies : 
                <select name="other[hobbies][]" multiple>
                    <?php $hobbiesData = ['Listening to Music', 'Travelling', 'Blogging', 'Sports', 'Art']; ?>
                    <?php foreach($hobbiesData as $hobbies) : ?>
                        <?php $selected = (array_intersect(getValue('other','hobbies'), [$hobbies])) ? 'selected' : ''; ?>
                        <option value="<?php echo $hobbies;?>" <?php echo $selected; ?>><?php echo $hobbies; ?></option>
                    <?php endforeach; ?>
                </select>        
            </div>

        </fieldset>
        <div class="account-submit">
            <input type="submit" name='submit' value="submit" />
        </div>
    </form>
    <script src="script.js"></script>
</body>
</html>