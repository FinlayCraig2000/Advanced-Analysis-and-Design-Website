<?php

require_once ("database.php");

class medication
{
    protected $connection;
    protected $database;

    public function __construct()
    {
        $this->database = new database("shareddb-y.hosting.stackcp.net", "knightsofnigel-313539d3d9", "ntuaad123", "knightsofnigel-313539d3d9");
        $this->connection = $this->database->connect_to_database();
    }

    public function getAllMedications(): array
    {
        $queryString = "SELECT * FROM tbl_medication";
        $result = $this->database->query($queryString);
        if (count($result) != 2) {
            return [];
        } else {
            return $this->database->buildResultArray($result[0]);
        }
    }

    public function getMedicationByID($ID): array
    {
        $queryString = "SELECT * FROM tbl_medication WHERE ID = ?";
        $result = $this->database->query($queryString, [$ID], "i");
        if (count($result) != 2) {
            return [];
        } else {
            return $this->database->buildResultArray($result[0]);
        }
    }

    public function collectPatientMedication($id,$date)
    {
        $queryString = "UPDATE tbl_patientMedication SET collected = ? WHERE ID = ?";
        $this->database->query($queryString, [$date,$id], "si");

    }

    public function getMedicationRequiredBloodwork($ID): array
    {
        $queryString = "SELECT bloodworkID from lnk_medicationBloodwork WHERE medicationID = ?";
        $result = $this->database->query($queryString, [$ID], "i");
        if (count($result) != 2) {
            return [];
        } else {
            return $this->database->buildResultArray($result[0]);
        }
    }

    public function getMedicationRequiredBloodworkName($ID): array
    {
        $queryString = "SELECT b.methodName 
                        from lnk_medicationBloodwork mb 
                        inner join tbl_bloodwork b on mb.bloodworkID = b.ID
                        WHERE medicationID = ?";
        $result = $this->database->query($queryString, [$ID], "i");
        if (count($result) != 2) {
            return [];
        } else {
            return $this->database->buildResultArray($result[0]);
        }
    }

    public function getMedicationRequiredBloodworkDetails($ID): array
    {
        $queryString = "SELECT methodCode, methodName FROM tbl_bloodwork
                        inner join lnk_medicationBloodwork on tbl_bloodwork.ID = lnk_medicationBloodwork.bloodworkID
                        where medicationID = ?";

        $result = $this->database->query($queryString, [$ID], "i");
        if (count($result) != 2) {
            return [];
        } else {
            return $this->database->buildResultArray($result[0]);
        }
    }
}