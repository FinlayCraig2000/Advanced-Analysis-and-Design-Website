<?php
session_start();
require_once 'vendor/autoload.php';
require 'classes/uac.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$username = null;
$forename = null;
$surname = null;
$eMail = null;
$userInput = null;
$option = null;
$bcrypt = null;
$NHS = null;

if (isset($_POST['username'])) {
    $username = $_POST['username'];
}

if (isset($_POST['first_name'])) {
    $forename = $_POST['first_name'];
}

if (isset($_POST['second_name'])) {
    $surname = $_POST['second_name'];
}

if (isset($_POST['email'])) {
    $eMail = $_POST['email'];
}

if (isset($_POST['password'])) {
    $userInput = $_POST['password'];
    $bcrypt = password_hash($_POST['password'],PASSWORD_BCRYPT);
}

if (isset($_POST['NHSID'])) {
    $NHS = $_POST['NHSID'];
}

if (isset($_GET['option'])) {
    $option = $_GET['option'];
}

if (isset($_POST['repeatPassword'])) {
    $repeatPassword = $_POST['repeatPassword'];
}


$dateNow = time();
$dateNow = intval($dateNow);

$error = false;
$control = new uac();

switch ($option) {
    case 1:
        if (!filter_var($eMail, FILTER_VALIDATE_EMAIL)) {header("location: register?invalid-email=true");}
        else {
            header("location: login");
            $rows = $control->CheckUserByEmailOrUser($eMail)[0];
            $rows += $control->CheckUserByEmailOrUser($username)[0];

            if ($rows == 0) {
                $control->InsertUserAndHash($username,$dateNow,$eMail,$forename,$surname,$bcrypt);
                $control->InsertNHSIDByUsername($NHS, $username);

            } else {header("location: login?already-registered=true");}
        }

        break;

    case 2:
            $verificationArray = $control->VerifyUserLogin($userInput,$eMail);
            if ($verificationArray[0])
            {
                $_SESSION["eMail"] = $verificationArray[1];
                $_SESSION["userid"] = $verificationArray[2];
                $_SESSION["username"] = $verificationArray[3];
                if($control->CheckPermission($_SESSION["userid"],"admin")) {
                    header("location: admin/home");
                }
                else{
                    header("location: user/home");
                }
            }
            else{
                header("location: login?error=true");
            }

        break;


    case 3:
        header("location: login");
        session_destroy();
        break;
    default:
        echo 'No option selected';
        break;

    case 4:
        if($control->CheckPermission($_SESSION["userid"],"admin")) {

            header("location: admin/home");
        }
        else{
            header("location: user/home");
        }
}

