<?php
session_start();
require '../classes/uac.php';


$control = new uac();

if (isset($_SESSION['userid'])) {
    $ID = $_SESSION['userid'];
    if (!$control->CheckPermission($ID, "admin")) {
        header("location: ../user/home");
    }
} else {
    header("location: ../login");
}

?>


<html xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html" lang="en">
<head>
    <?php require_once '../vendor/autoload.php'; ?>
    <link rel="stylesheet" href="../css/profile/admin/settingsAdminPage.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.js"></script>
    <script type="text/javascript" src="js/settings.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Settings</title>
</head>

<body>
<div class="background-main" id="background-select">
    <div id="side-menu-id" class="side-menu-container" style="width: 0px">
        <a href="javascript:void(0)" class="side-menu-close-button" onclick="closeNav()">&times;</a>
        <div class="side-menu-button-container">
            <a href="../admin/home" class="home-a-button">
                <img src="../images/profile/homepage/Home-Image.svg" class="admin-home-image" alt="Home Image">
                <p>Home</p>
            </a>

            <a href="../admin/settings" class="settings-a-button">
                <img src="../images/profile/homepage/Settings-Image.svg" class="admin-settings-image"
                     alt="Settings Image">
                <p>Settings</p>
            </a>

            <a href="../admin/prescriptions" class="prescriptions-a-button">
                <img src="../images/profile/homepage/Prescription-Image.svg" class="admin-prescription-image"
                     alt="Prescription Image">
                <p>Prescriptions</p>
            </a>

            <a href="../admin/stock" class="stock-a-button">
                <img src="../images/profile/homepage/Stock-Image.svg" class="admin-stock-image" alt="Stock Image">
                <p>Stock</p>
            </a>

            <a href="../admin/bloodwork" class="blood-work-a-button">
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
                        <b>THIS IS THE ADMIN SETTINGS PAGE</b>
                    </div>
                    <div class="header-center">Username: <?php echo $_SESSION['username']; ?></div>
                    <h2>My Customers</h2>

                    <input type="text" id="myInput" onkeyup="searcher()" placeholder="Search for names.."
                           title="Type in a name">

                    <table class="table table-striped" id="userTable">
                    </table>
                </div>

                <script>
                    constructTable("#userTable")
                </script>
            </div>
        </div>
    </div>
</div>

</body>


<div id="userModal" class="modal fade" role="dialog" aria-labelledby="userModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 id="userName" ></h3>
            </div>
            <div class="grid-container">
                <div class="left-column">
                    <div class="center-container-column-left">
                        <div id="userID" class="modal-body"></div>
                        <div id="userEmail" class="modal-body"></div>
                        <div id="userPermission" class="modal-body"></div>
                    </div>
                </div>

                <div class="right-column">
                    <div class="center-container-column-right">
                        <div class="combobox">
                            <div class="dropdown">
                                <label for="drop-btn">
                                    <select name="drop-btn" id="drop-btn">
                                        <option value="user">User</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                </label>
                            </div>
                        </div>

                        <div class="button">
                            <button class="btn" data-dismiss="modal" aria-hidden="true" onclick="changePermission()">GRANT PERMISSION</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            </div>
        </div>
    </div>
</div>

</html>