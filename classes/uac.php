<?php

require_once ("database.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class uac
{
    protected $connection;
    protected $database;

    public function __construct()
    {
        $this->database = new database("shareddb-y.hosting.stackcp.net", "knightsofnigel-313539d3d9", "ntuaad123", "knightsofnigel-313539d3d9");
        $this->connection = $this->database->connect_to_database();
    }

    function GetUser($userID){
        $queryString = "SELECT * FROM tbl_username WHERE ID = ?";
        $result = $this->database->query($queryString, [$userID],'i')[0];
        return $result->fetch_object();
    }

    function GetUsers(){
        $queryString = "SELECT ID, username, email, forename, surname FROM tbl_username";
        $result = $this->connection->query($queryString);
        return $this->database->buildResultArray($result);
    }

    function GivePermission($userID,$permission){
        $queryString = "INSERT INTO lnk_userPermission SET userID = ?, permissionID = (SELECT ID FROM tbl_permission WHERE tag = ?)";
        $this->database->query($queryString, [$userID,$permission],'is');
    }

    function ChangePermission($userID, $permission){
        $queryString = "UPDATE lnk_userPermission SET permissionID = (SELECT ID FROM tbl_permission WHERE tag = ?) WHERE userID = ?";
        $this->database->query($queryString, [$permission,$userID],'si');
    }

    function GetPermission($userID){
        $queryString = "SELECT tbl_permission.tag as permission FROM lnk_userPermission INNER JOIN tbl_permission ON lnk_userPermission.permissionID = tbl_permission.ID WHERE userID = ?";
        $result = $this->database->query($queryString, [$userID],'i')[0];
        $resultObject = $result->fetch_object();
        return $resultObject->permission;
    }

    function CheckPermission($userID, $permission): bool{
        $queryString = "SELECT * FROM lnk_userPermission WHERE userID=? AND permissionID=(SELECT tbl_permission.ID FROM tbl_permission WHERE tag = ?)";
        $result = $this->database->query($queryString, [$userID,$permission],'is')[0];
        $rows = $result->num_rows;

        if ($rows == 0){return false;}
        return true;
    }

    function InsertUserAndHash($username,$dateNow,$eMail,$forename,$surname,$bcrypt){
        $queryString = "INSERT INTO tbl_username (username, datecreated, email, forename, surname) VALUES (?,?,?,?,?)";
        $results = $this->database->query($queryString, [$username, $dateNow, $eMail, $forename, $surname],'sisss');
        $userID = $results[1];

        $this->GivePermission($userID,"user");

        $queryString = "INSERT INTO tbl_hashword (hashword) VALUES (?)";
        $results = $this->database->query($queryString, [$bcrypt],'s');
        $hashID = $results[1];

        $queryString = "INSERT INTO lnk_userHash(userID, hashID) VALUES (?,?)";
        $this->database->query($queryString, [$userID, $hashID],'ii');
    }

    function InsertNHSIDByUsername($nhsId, $userName) {
        $queryString = "insert into tbl_patient (NHSNumber, userID) select ?, u.ID from tbl_username u where username=?";
        $this->database->query($queryString, [$nhsId, $userName], "is");
    }

    function CheckUserByEmailOrUser($input): array{
        $queryString = "SELECT * FROM tbl_username WHERE email=? OR username=?";
        $results = $this->database->query($queryString, [$input,$input],'ss');
        $result = $results[0];
        $rows = $result->num_rows;
        $resultObject = $result->fetch_object();
        return [$rows, $resultObject];
    }

    function VerifyUserLogin($passwordInput,$userInput): array{
        $resultArray = $this->CheckUserByEmailOrUser($userInput);
        $rows = $resultArray[0];
        $resultObject = $resultArray[1];

        if ($rows != 0) {
            $currentEmail = $resultObject->email;
            $currentUsername = $resultObject->username;
            $currentID = $resultObject->ID;
            $queryString = "SELECT tbl_hashword.hashword FROM lnk_userHash INNER JOIN tbl_hashword ON lnk_userHash.hashID = tbl_hashword.ID WHERE lnk_userHash.userID=?";
            $results = $this->database->query($queryString, [$currentID],'i');
            $hashFound = $results[0]->fetch_object();
            $hash = $hashFound->hashword;

            if (($userInput == $currentEmail or $userInput == $currentUsername) && password_verify($passwordInput, $hash) === true) {
                return [true,$currentEmail,$currentID,$currentUsername];
            }
        }
        return [false];
    }
}