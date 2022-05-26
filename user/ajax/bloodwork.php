<?php

require_once ('../../classes/bloodwork.php');

header('Content-Type: application/json');

function GetBloodtests(){
    $control = new bloodwork();
    return $control->getBloodtests();
}

$aResult = array();

if( !isset($_POST['functionName']) ) { header("location: ../bloodwork"); }

if( !isset($_POST['arguments']) ) { header("location: ../bloodwork"); }

if( !isset($aResult['error']) ) {

    switch($_POST['functionName']) {
        case 'getBloodworks':
            if( !is_array($_POST['arguments']) || (count($_POST['arguments']) !=1) ) {
                $aResult['error'] = 'Error in GetBloodtests arguments!';
            }
            else {
                $aResult['result'] = GetBloodtests();
            }
            break;

        default:
            $aResult['error'] = 'Not found function '.$_POST['functionName'].'!';
            break;
    }

}

echo json_encode($aResult);

