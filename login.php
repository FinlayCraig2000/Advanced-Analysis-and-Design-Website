<html xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
    <?php require_once 'vendor/autoload.php'; ?>
    <meta http-equiv="refresh" content="">
    <link rel="stylesheet" href="css/loginPage.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<div class="background-main" id="background-select">
    <div class="template-margin-container">
        <div class="flex-center-container">
            <div class="account-form-container" id="login-form-container">
                <img src="images/knightsofnigel.png" alt="Knights of Nigel Image" class="knights-of-nigel-image-login">

                <form class="login-form" action="client-processing.php?option=2" method="post">

                    <div class="user-input-info-login">
                        <div class="login-row">
                            <input type="text" id="emailAddressID" placeholder="Email/Username" name="email" class="email-input-row" required>
                        </div>

                        <div class="login-row">
                            <input type="password" id="passwordField" placeholder="Password" name="password" class="password-input-row" required>
                        </div>
                    </div>

                    <div class="login-buttons-container">
                        <input type="button" id="helpButton" value="Help" class="help-input-button" data-target="#helpModal" data-toggle="modal">
                        <input type="submit" id="submitButton" value="Login" class="login-input-button">
                    </div>
                </form>

                <div class="account-switch-to-register-container">
                    <a href="register" id="new-user">
                        <input type="button" id="registerButton" value="Not registered? Click here to register" class="account-switch-input-button">
                    </a>
                </div>

                <div id="error" class="error-container">
                    <?php if (isset($_GET['error']) == true) {
                        echo 'Incorrect email/password';
                    } ?>
                    <?php if (isset($_GET['already-registered']) == true) {
                        echo 'A user with that account is already registered!';
                    } ?>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

<div id="helpModal" class="modal fade" role="dialog" aria-labelledby="scanModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Help - AAD Project</h3>
            </div>

            <div class="help-modal-contents">
                <p>This is a project for ADD Created by:</p>
                <p>Joey</p>
                <p>Cian</p>
                <p>Isaac</p>
                <p>Finlay</p>
                <p>Nathan</p>
                <p>Caiden</p>
            </div>

            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            </div>

        </div>
    </div>
</div>

</html>