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

    public function getComputers()
    {
        $stmt = 'SELECT * FROM computers';
        $result = $this->connection->query($stmt);
        return $result->fetch_all();
    }

    public function getComputerUsedBy()
    {
        $stmt = 'SELECT * FROM computer_used_by';
        $result = $this->connection->query($stmt);
        return $result->fetch_all();
    }

    public function getCrimeSceneReport()
    {
        $stmt = 'SELECT * FROM crime_scene_report';
        $result = $this->connection->query($stmt);
        return $result->fetch_all();
    }

    public function getDiscordProfile()
    {
        $stmt = 'SELECT * FROM discord_profile';
        $result = $this->connection->query($stmt);
        return $result->fetch_all();
    }

    public function getEvent()
    {
        $stmt = 'SELECT * FROM event';
        $result = $this->connection->query($stmt);
        return $result->fetch_all();
    }

    public function getPeople()
    {
        $stmt = 'SELECT * FROM person';
        $result = $this->connection->query($stmt);
        return $result->fetch_all();
    }

    public function getTeams()
    {
        $stmt = 'SELECT * FROM teams';
        $result = $this->connection->query($stmt);
        return $result->fetch_all();
    }

    public function getTeamMembers()
    {
        $stmt = 'SELECT * FROM team_members';
        $result = $this->connection->query($stmt);
        return $result->fetch_all();
    }

    public function getTransportMethod()
    {
        $stmt = 'SELECT * FROM transport_method';
        $result = $this->connection->query($stmt);
        return $result->fetch_all();
    }

}