<?php
require_once ('../../classes/uac.php');

$control = new uac();

header('Content-Type: application/json');

function getPermission($userID){
    $control = new uac();
    return $control->GetPermission($userID);
}

function changePermission($userID, $tag){
    $control = new uac();
    $control->ChangePermission($userID, $tag);
    return ("set permission to ".$tag." for user with ID ".$userID);
}

function checkPermission($userID, $tag){
    $control = new uac();
    return $control->CheckPermission($userID, $tag);
}

function getUsers(){
    $control = new uac();
    return $control->GetUsers();
}

function getUser($userID){
    $control = new uac();
    return $control->GetUser($userID);
}



$aResult = array();

if( !isset($_POST['functionName']) ) { header("location: ../settings"); }

if( !isset($_POST['arguments']) ) { header("location: ../settings"); }

if( !isset($aResult['error']) ) {

    switch($_POST['functionName']) {
        case 'getPermission':
            if( !is_array($_POST['arguments']) || (count($_POST['arguments']) !=1) ) {
                $aResult['error'] = 'Error in getPermission arguments!';
            }
            else {
                $aResult['result'] = getPermission($_POST['arguments'][0]);
            }
            break;

        case 'changePermission':
                $aResult['result'] = changePermission($_POST['arguments'][0], $_POST['arguments'][1]);
            break;

        case 'checkPermission':
            if( !is_array($_POST['arguments']) || (count($_POST['arguments']) !=1) ) {
                $aResult['error'] = 'Error in checkPermission arguments!';
            }
            else {
                $aResult['result'] = checkPermission($_POST['arguments'][0],$_POST['arguments'][1]);
            }
            break;

        case 'getUsers':
            if( !is_array($_POST['arguments']) || (count($_POST['arguments']) !=1) ) {
                $aResult['error'] = 'Error in getUsers arguments!';
            }
            else {
                $aResult['result'] = getUsers();
            }
            break;

        case 'getUser':
            if( !is_array($_POST['arguments']) || (count($_POST['arguments']) !=1) ) {
                $aResult['error'] = 'Error in getUser arguments!';
            }
            else {
                $aResult['result'] = getUser($_POST['arguments'][0]);
            }
            break;

        default:
            $aResult['error'] = 'Not found function '.$_POST['functionName'].'!';
            break;
    }

}

echo json_encode($aResult);

?>

