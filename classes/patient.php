<?php


require_once ("database.php");
require_once ("medication.php");

class patient
{
    protected $connection;
    protected $database;

    public function __construct()
    {
        $this->database = new database("shareddb-y.hosting.stackcp.net", "knightsofnigel-313539d3d9", "ntuaad123", "knightsofnigel-313539d3d9");
        $this->connection = $this->database->connect_to_database();
    }
    public function getPatientObjectByUserID($userID): array
    {
        $queryString = "SELECT * FROM tbl_patient WHERE userID = ?";
        $result = $this->database->query($queryString, [$userID], "i");
        if (count($result) != 2) {
            return [];
        } else {
            return [$result[0]->fetch_object()];
        }
    }

    public function getNHSIDbyUserID($userID){
        $queryString = "SELECT NHSNumber FROM tbl_patient WHERE userID = ?";
        $result = $this->database->query($queryString, [$userID], "i");
        if (count($result) != 2) {
            return [];
        } else {
            return $result[0]->fetch_object()->NHSNumber;
        }
    }

    public function getMedicationsByPatientID($userID): array
    {
        $queryString = "select 
       pm.ID, 
       m.medicationName as Medication, 
       pm.prescribed as Prescribed, 
       pm.collected as Collected, 
       b.methodName as Missing_Bloodwork 
                        from tbl_patientMedication pm
                        inner join tbl_medication m on pm.medicationID = m.ID
                        inner join lnk_medicationBloodwork mb on m.ID = mb.medicationID
                        inner join tbl_bloodwork b on mb.bloodworkID = b.ID
                        inner join tbl_patient u on u.NHSNumber = pm.patientID
                        where pm.patientID = ?;";
        $result = $this->database->query($queryString, [$userID], "i");
        if (count($result) != 2) {
            return [];
        } else {
            $results = $this->database->buildResultArray($result[0]);
            $editedResults = [];

            foreach ($results as $result){
                $prescriptionID = $result["ID"];
                $bloodworkCheck = $this->checkMedicationForBloodwork($prescriptionID);
                if($bloodworkCheck["givePrescription"] == 2){
                    $result["Missing_Bloodwork"] = $result["Missing_Bloodwork"]." is needed for this prescription.";
                }
                elseif($bloodworkCheck["givePrescription"] == 1){
                    $result["Missing_Bloodwork"] = $result["Missing_Bloodwork"]." is wanted for this prescription but not required.";
                }
                else {
                    $result["Missing_Bloodwork"] = "No extra bloodwork required";
                }
                array_push($editedResults,$result);
            }
            return $editedResults;
        }
    }

    public function addPatientMedication($nhsID, $medicationID, $datePrescribed)
    {
        $queryString = "INSERT INTO tbl_patientMedication
                        (patientID, medicationID, prescribed)
                        VALUES (?, ?, ?)";
        $this->database->query($queryString,
                               [$nhsID, $medicationID, $datePrescribed],
                               "sss"
        );
    }

    public function getPrescriptionByID($prescriptionID): array
    {
        $queryString = "SELECT pm.ID, pm.patientID, m.medicationName, pm.prescribed, pm.collected FROM tbl_patientMedication pm
                        inner join tbl_medication m on pm.medicationID = m.ID
                        WHERE pm.ID = ?";
        $result = $this->database->query($queryString, [$prescriptionID], "i");
        if (count($result) != 2) {
            return [];
        } else {
            return $this->database->buildResultArray($result[0]);
        }
    }

    public function addPatientBloodwork($nhsID, $bloodworkID, $start, $end)
    {
        // NOTE: Pass in dates resulting from the PHP date() function
        // in the format Y-m-d
        $queryString = "INSERT INTO tbl_patientBloodwork
                        (patientID, bloodworkID, start, expire)
                        VALUES (?, ?, ?, ?)";
        $this->database->query($queryString,
                               [$nhsID, $bloodworkID, $start, $end],
                               "iiss"
        );
    }

    public function getPatientBloodworks($nhsID): array
    {
        $queryString = "SELECT m.bloodworkID, b.methodName, m.start, m.expire FROM tbl_patientBloodwork m 
                        INNER JOIN tbl_bloodwork b on m.bloodWorkID = b.ID
                        WHERE patientID = ?";
        $result = $this->database->query($queryString, [$nhsID], "i");
        if (count($result) != 2) {
            return [];
        } else {
            return $this->database->buildResultArray($result[0]);
        }
    }

    public function checkMedicationForBloodwork($prescriptionID): array
    {
        $queryString = "SELECT patientID, medicationID FROM tbl_patientMedication WHERE ID = ?";
        $result = $this->database->query($queryString, [$prescriptionID], "i");

        $object = $result[0]->fetch_object();
        $medicationID = $object->medicationID;
        $nhsID = $object->patientID;

        // TODO: once question about specific bloodwork tests per medication is answered
        $model = new medication();
        $medication = $model->getMedicationByID($medicationID)[0];
        $medicationName = $medication["medicationName"];
        $restrictionLevel = $medication["bloodWorkRestriction"];

        $bloodworks = $model->getMedicationRequiredBloodworkName($medicationID)[0]["methodName"];



        $queryString = "SELECT * FROM tbl_patientMedication WHERE id = ?";
        $result = $this->database->query($queryString, [$prescriptionID], "i");
        if (count($result) != 2)
        {
            return [];
        } else {
            $row = $this->database->buildResultArray($result[0])[0];
        }
        $prescriptionID = $row["ID"];
        $prescribed = $row["prescribed"];
        $expire = $row["collected"];

        if ($restrictionLevel <= 1 ||
            $this->hasCurrentBloodworks($nhsID, $medicationID)) {
            $givePrescription = 0;
        } else {
            $givePrescription = $restrictionLevel - 1;
        }

        return array(
            "bloodworkLevel" => $restrictionLevel,
            "prescription" => array (
                "ID" => $prescriptionID,
                "Medication" => $medicationName,
                "Date Prescribed" => $prescribed,
                "Date Collected" => $expire,
            ),
            "givePrescription" => $givePrescription,
            "bloodworkName" => $bloodworks
        );
    }

    private function hasCurrentBloodworks($nhsID, $medicationID): bool
    {
        $model = new medication();
        $requiredBloodworks = $model->getMedicationRequiredBloodwork($medicationID);

        foreach ($requiredBloodworks as $bloodwork) {
            $bw = $bloodwork["bloodworkID"];
            if (!$this->hasCurrentBloodwork($nhsID, $bw)) {
                return false;
            }
        }
        return true;
    }

    private function hasCurrentBloodwork($nhsID, $bloodworkID): bool
    {
        $patientBloodworks = $this->getPatientBloodworks($nhsID);
        foreach ($patientBloodworks as $patientBloodwork) {
            if ($patientBloodwork["bloodworkID"] == $bloodworkID &&
                $this->todayInDateRange($patientBloodwork["start"], $patientBloodwork["expire"])) {
                return true;
            }
        }
        return false;
    }


    private function todayInDateRange($begin, $end): bool
    {
        $beginDateTime = strtotime($begin);
        $endDateTime = strtotime($end);
        $now = strtotime(date("Y-m-d"));

        if ($now >= $beginDateTime && $now < $endDateTime) {
            return true;
        } else {
            return false;
        }
    }
}