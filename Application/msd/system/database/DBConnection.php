<?php

class DBConnection {
    /*
     *  class: DBConnection
     *  purpose: Provide database connection to the system
     *
     */
    private $connection;

    public function openConnection() {
        $this->connection = new mysqli('localhost', "root", "", "msd");
        //Check connection
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }

        if($this->connection === false){
            return false;
        }
        return $this->connection;
    }

    function closeConnection() {
        mysqli_close($this->connection);
    }

    function executeRawQuery($query) {
        return mysqli_query($this->connection, $query);
    }

    function getResult($query) {
        return mysqli_result($this->connection, $query);
    }
}
