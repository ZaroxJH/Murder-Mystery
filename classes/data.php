<?php

require_once "database.php";

class data extends database
{

    function __construct()
    {
        parent::__construct();
    }

    public function showTables()
    {
        $stmt = 'show tables from murder_mystery';
        $result = $this->connection->query($stmt);
        return $result->fetch_all();
    }

    public function getPeople()
    {
        $stmt = 'SELECT * FROM person';
        $result = $this->connection->query($stmt);
        return $result->fetch_all();
    }

    public function getComputerUsedBy()
    {
        $stmt = 'SELECT * FROM computer_used_by';
        $result = $this->connection->query($stmt);
        return $result->fetch_all();
    }

}