<html xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
    <?php require_once 'vendor/autoload.php'; ?>
    <meta http-equiv="refresh" content="">
    <link rel="stylesheet" href="css/loginPage.css"
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div class="background-main" id="background-select">
    <div class="template-margin-container">
        <div class="flex-center-container">
            <div class="account-form-container" id="register-form-container">
                <form class=login-form action="client-processing.php?option=1" method="post">
                    <div class="user-input-info-register">
                        <div class="left">
                            <div class="account-detail-row">
                                <input type="text" id="firstNameID" placeholder="Forename" name="first_name" required>
                            </div>

                            <div class="login-row">
                                <input type="text" id="secondNameID" placeholder="Surname" name="second_name" required>
                            </div>

                            <div class="login-row">
                                <input type="text" id="emailAddressID" placeholder="Email" name="email" required>
                            </div>

                            <div class="login-row">
                                <input type="text" id="userNameID" placeholder="Username" name="username" required>
                            </div>

                            <div class="login-row">
                                <input type="password" id="passwordField" placeholder="Password" name="password" required>
                            </div>

                            <div class="login-row">
                                <input type="password" id="passwordField" placeholder="Repeat Password" name="repeatPassword" required>
                            </div>

                            <div class="login-row">
                                <input type="number" id="nhsID" placeholder="NHS ID" name="NHSID" required>
                            </div>
                        </div>

                        <div class="right">
                            <div class="profile-image">
                                <i class="fas fa-user-circle"></i>
                                <img src="images/user-circle-solid-TEMP.svg" alt="Profile Picture" class="set-user-profile-image">
                            </div>
                        </div>
                    </div>

                    <div class="create-account-container">
                        <input type="submit" id="submitButton" value="Register" class="register-user-button">
                    </div>
                </form>

                <div id="error" class="error-container">
                    <div id="error"><?php if (isset($_GET['invalid-email']) == true) {
                            echo 'Please enter a valid email address!';
                        } ?>
                    </div>
                </div>
                <div class="account-switch-to-login-container">
                    <a href="login" id="existing-user">
                        <input type="button" id="registerButton" value="Already Registered? Click Here" class="account-switch-input-button">
                    </a>
                </div>

                <img src="images/knightsofnigel.png" alt="Knights of Nigel Image" class="knights-of-nigel-image-register">
            </div>
        </div>
    </div>
</div>

</div>
</body>
</html>