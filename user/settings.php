<?php session_start();
if (!isset($_SESSION["username"])) {
    header("location: ../login");
}
?>

<html xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
    <?php require_once '../vendor/autoload.php'; ?>
    <script type="text/javascript" src="js/settings.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.js"></script>
    <script type="text/javascript" src="./js/includeHTML.js"></script>
    <link rel="stylesheet" href="../css/profile/user/settingsPage.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body onload=FormGenerator()>

<div class="background-main" id="background-select">
    <div id="side-menu-id" class="side-menu-container" style="width: 0px">
        <a href="javascript:void(0)" class="side-menu-close-button" onclick="closeNav()">&times;</a>
        <div class="side-menu-button-container">
            <a href="../user/home" class="home-a-button">
                <img src="../images/profile/homepage/Home-Image.svg" class="admin-home-image" alt="Home Image">
                <p>Home</p>
            </a>

            <a href="../user/settings" class="settings-a-button">
                <img src="../images/profile/homepage/Settings-Image.svg" class="admin-settings-image"
                     alt="Settings Image">
                <p>Settings</p>
            </a>

            <a href="../user/prescriptions" class="prescriptions-a-button">
                <img src="../images/profile/homepage/Prescription-Image.svg" class="admin-prescription-image"
                     alt="Prescription Image">
                <p>Prescriptions</p>
            </a>

            <a href="../user/stock" class="stock-a-button">
                <img src="../images/profile/homepage/Stock-Image.svg" class="admin-stock-image" alt="Stock Image">
                <p>Stock</p>
            </a>

            <a href="../user/bloodwork" class="blood-work-a-button">
                <img src="../images/profile/homepage/Blood-work-Image.svg" class="admin-blood-work-image" alt="Blood work image Image">
                <p>Blood work</p>
            </a>
        </div>
    </div>

    <script>
        function openNavToggle() {
            if (document.getElementById("side-menu-id").style.width === "0px") {
                document.getElementById("side-menu-id").style.width = "250px";
                document.getElementById("main-content").style.marginLeft = "250px";
            } else {
                document.getElementById("side-menu-id").style.width = "0";
                document.getElementById("main-content").style.marginLeft = "0";
            }
        }

        function closeNav() {
            document.getElementById("side-menu-id").style.width = "0";
            document.getElementById("main-content").style.marginLeft = "0";
        }
    </script>


    <div id="main-content" style="margin-left: 0px">
        <div class="top-options-bar">

            <span class="navigation-options-buttons" onclick="openNavToggle()">
                <img src="../images/profile/homepage/Side-Menu-Image.svg" class="admin-home-side-menu-image">
            </span>

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
                <div class="user-admin-global-flex-container">
                    <div class="header-center">
                        <b>THIS IS THE USER SETTINGS PAGE</b>
                        <div class="header-center">Username: <?php echo $_SESSION['username']; ?></div>

                            <form action="#" onsubmit="performButtonPress();return false">


                                <div class="section-container light-bg">
                                <div class="row">
                                    <div class="col light-panel">
                                        <div class="row"><b class="text">Forename</b></div>
                                        <div class="row"><span class="label label-default">*required </span></div>
                                        <input required type="text" placeholder="Forename" id="userForename" size="20"/>
                                    </div>
                                    <div class="col light-panel">
                                        <div class="row"><b class="text">Surname</b></div>
                                        <div class="row"><span class="label label-default">*required </span></div>
                                        <input required type="text" placeholder="Surname" id="userSurname" size="20"/>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col light-panel">
                                        <div class="row"><b class="text">Password</b></div>
                                        <div class="row"><span class="label label-default">*leave blank if not changed </span></div>
                                        <input type="password" placeholder="New Password" id="userNewPass" size="20"/>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col light-panel">
                                        <div class="row"><b class="text">Email</b></div>
                                        <div class="row"><span class="label label-default">*required </span></div>
                                        <input type="text" placeholder="Email" id="userEmail" size="30"/>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col light-panel">

                                        <input type="submit"/>
                                        <input required type="password" placeholder="Confirm Password" id="confirmPassword"/>
                                    </div>
                                </div>
                                    </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>