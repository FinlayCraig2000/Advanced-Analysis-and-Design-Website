<?php

require_once ('../../classes/patient.php');

header('Content-Type: application/json');

function AddBloodTest($userID, $bloodworkID, $startDate, $expireDate){
    $control = new patient();

    $patientID = $control->getPatientObjectByUserID($userID)[0]->NHSNumber;

    $control->addPatientBloodwork($patientID, $bloodworkID, $startDate, $expireDate);

    return ("Gave bloodwork of ID: ".$bloodworkID." for patient with ID: ".$patientID);
}

function checkPrescriptionForBloodWork($prescriptionID){
    $control = new patient();
    return $control->checkMedicationForBloodwork($prescriptionID);
}

function getMedications(){
    $control = new medication();
    return $control->getAllMedications();
}

function prescribeMedication($userID, $medicationID, $datePrescribed){
    $control = new patient();
    $patientID = $control->getPatientObjectByUserID($userID)[0]->NHSNumber;
    $control->addPatientMedication($patientID, $medicationID, $datePrescribed);
    return ("Prescribed medication with ID: ".$medicationID." for patient with ID: ".$patientID);
}

function getPrescribedMedications($userID){
    $control = new patient();
    $patientID = $control->getPatientObjectByUserID($userID)[0]->NHSNumber;
    return $control->getMedicationsByPatientID($patientID);
}

function getUserBloodworks($userID){
    $control = new patient();
    $patientID = $control->getPatientObjectByUserID($userID)[0]->NHSNumber;
    return $control->getPatientBloodworks($patientID);
}

function getPrescriptionByID($prescriptionID){
    $control = new patient();
    return $control->getPrescriptionByID($prescriptionID);

}

function getBloodworksForMedication($medicationID){
    $control = new medication();
    return $control->getMedicationRequiredBloodworkDetails($medicationID);
}

function collectPatientMedication($prescriptionID){
    $control = new medication();
    $date = date("Y-m-d H:i:s");
    $control->collectPatientMedication($prescriptionID,$date);
    return ("Prescription with ID ".$prescriptionID." has been collected on ".$date);
}

$aResult = array();

if( !isset($_POST['functionName']) ) { header("location: ../bloodwork"); }

if( !isset($_POST['arguments']) ) { header("location: ../bloodwork"); }

if( !isset($aResult['error']) ) {

    switch($_POST['functionName']) {

        case 'checkPrescriptionBloodwork':
            $aResult['result'] = checkPrescriptionForBloodWork($_POST['arguments'][0]);
            break;

        case 'getPrescriptionByID':
            $aResult['result'] = getPrescriptionByID($_POST['arguments'][0]);
            break;

        case 'collectPatientMedication':
            $aResult['result'] = collectPatientMedication($_POST['arguments'][0]);
            break;

        case 'getBloodworksForMedication':
            $aResult['result'] = getBloodworksForMedication($_POST['arguments'][0]);
            break;


        case 'addBloodTest':
            $aResult['result'] = AddBloodTest($_POST['arguments'][0],$_POST['arguments'][1],$_POST['arguments'][2],$_POST['arguments'][3]);
            break;

        case 'prescribe':
            $aResult['result'] = prescribeMedication($_POST['arguments'][0],$_POST['arguments'][1],$_POST['arguments'][2]);
            break;

        case 'getPatientBloodworks':
            $aResult['result'] = getUserBloodworks($_POST['arguments'][0]);
            break;

        case 'getPatientPrescriptions':
            $aResult['result'] = getPrescribedMedications($_POST['arguments'][0]);
            break;

        case 'getMedications':
            if( !is_array($_POST['arguments']) || (count($_POST['arguments']) !=1) ) {
                $aResult['error'] = 'Error in getPermission arguments!';
            }
            else {
                $aResult['result'] = getMedications();
            }
            break;
        default:
            $aResult['error'] = 'Not found function '.$_POST['functionName'].'!';
            break;
    }

}

echo json_encode($aResult);

?>

