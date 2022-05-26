<?php


class database
{
    protected $host;
    protected $username;
    protected $password;
    protected $databaseName;
    protected $dbConn;

    public function __construct($host, $username, $password, $databaseName)
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->databaseName = $databaseName;
    }

    public function connect_to_database()
    {
        $this->dbConn = $connection =
            mysqli_connect($this->host, $this->username,
                $this->password, $this->databaseName);
        if ($this->dbConn->connect_error) {
            die("$this->dbConn->connect_errno: $this->dbConn->connect_error");
        }
        return $this->dbConn;
    }

    public function query($query_string, $params=False, $param_types=False): array
    {
        /*
         * Performs a prepared query on the database. Takes the SQL Query as a string,
         * the query as an array of references, and parameter types as a string.
         * In the case of an error, the method dies. In the case the query is not a
         * select, it returns an empty array. In the case of a select, it will return
         * the result object.
         */
        $this->connect_to_database();

        //if not a param query
        if (!$params){
            $res = $this->dbConn->query($query_string);
            if ($res == false && $this->dbConn->errno != 0) {
                die("$this->dbConn->errno: $this->dbConn->error");
            } else {
                return [$res,false];
            }
        }


        //if param in query

        $sql = $this->dbConn->prepare($query_string);
        if (!$sql) {
            print "Failed to prepare statement";
        } else {
            $sql->bind_param($param_types, ...$params);
            $sql->execute();
            $id = $this->dbConn->insert_id;
            $res = $sql->get_result();
            $sql->close();
            if ($res == false && $this->dbConn->errno != 0) {
                die("$this->dbConn->errno: $this->dbConn->error");
            } else {
                return [$res,$id];
            }
        }
    }

    public function buildResultArray($result): array
    {
        // Returns array of dicts, each dict corresponds to one row.
        // Keys are the column names.
        $rows = [];
        while($row = $result->fetch_assoc()) {
            array_push($rows, $row);
        }
        return $rows;
    }
}