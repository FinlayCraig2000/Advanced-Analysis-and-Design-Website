<?php session_start();
if (!isset($_SESSION["username"])) {
    header("location: ../login");
}
?>

<html xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
    <?php require_once '../vendor/autoload.php'; ?>
    <link rel="stylesheet" href="../css/profile/user/homePage.css"
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="../admin/js/includeHTML.js"></script>
    <title>Home Page</title>
</head>
<body>

<div w3-include-html="../admin/svgColourValuesStorage.xhtml"></div>
<script>
    includeHTML()
</script>

<div class="background-main" id="background-select">
    <div class="top-options-bar">
        <div class="top-options-container-right">
            <a href="../client-processing.php?option=3">
                <div class="log-out-container">
                    <img src="../images/profile/homepage/Logout-Image.svg" class="admin-homepage-logout-image">
                </div>
            </a>
        </div>
    </div>
    <div class="template-margin-container">
        <div class="flex-center-container">
            <div class="user-admin-home-flex-container">
                <div class="profile-grid-container">

                    <button class="button settings">
                        <a href="../user/settings">
                            <div class="image-button-container">
                                <img src="../images/profile/homepage/Settings-Image.svg" class="admin-homepage-settings-image">
                                <p>Settings</p>
                            </div>
                        </a>
                    </button>

                    <button class="button prescriptions">
                        <a href="../user/prescriptions">
                            <div class="image-button-container">
                                <img src="../images/profile/homepage/Prescription-Image.svg" class="admin-homepage-prescription-image">
                                <p>Prescriptions</p>
                            </div>
                        </a>
                    </button>

                    <button class="button stock">
                        <a href="../user/stock">
                            <div class="image-button-container">
                                <img src="../images/profile/homepage/Stock-Image.svg" class="admin-homepage-stock-image">
                                <p>Stock</p>
                            </div>
                        </a>
                    </button>

                    <button class="button bloodwork">
                        <a href="../user/bloodwork">
                            <div class="image-button-container">
                                <img src="../images/profile/homepage/Blood-work-Image.svg" class="admin-homepage-blood-work-image">
                                <p>Blood Work</p>
                            </div>
                        </a>
                    </button>
                </div>
                <div class="image-temp-name">
                    <img src="../images/knightsofnigel.png" alt="Knights of Nigel Image" class="knights-of-nigel-image-home-page">
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>