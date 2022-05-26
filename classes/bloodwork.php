<?php

require_once ("database.php");

class bloodwork
{
    protected $connection;
    protected $database;

    public function __construct()
    {
        $this->database = new database("shareddb-y.hosting.stackcp.net", "knightsofnigel-313539d3d9", "ntuaad123", "knightsofnigel-313539d3d9");
        $this->connection = $this->database->connect_to_database();
    }

    public function getBloodtests(): array
    {
        $queryString = "SELECT * FROM tbl_bloodwork";
        $result = $this->database->query($queryString);
        if (count($result) != 2) {
            return [];
        } else {
            return $this->database->buildResultArray($result[0]);
        }
    }

}