<?php

require_once "database.php";

class data
{
    function __construct()
    {
        $this->database = new database();
    }

    public function getUsers()
    {
        $stmt = 'SELECT * FROM gebruikers';
        $result = $this->database->connection->query($stmt);

        foreach ($result as $gay) {
            echo $gay['gebruikersnaam'];
        }
    }
}