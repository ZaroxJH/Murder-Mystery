<?php

class database
{
    public $dbhost = 'localhost';
    public $dbname = 'murder_mystery';
    public $dbusername = 'root';
    public $dbpassword = '';
    public $connection = [];

    function __construct()
    {
        $this->connection = mysqli_connect($this->dbhost, $this->dbusername, $this->dbpassword, $this->dbname);

        // Check connection
        if ($this->connection === false) {
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }
    }

}