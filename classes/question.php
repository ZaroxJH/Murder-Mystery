<?php
require_once "admin/classes/main_database.php";
require_once "classes/database.php";

class question extends main_database
{

    function __construct()
    {
        parent::__construct();
        $this->database = new database();
    }

    private function getQuestion()
    {
        $stmt = 'SELECT description FROM questions';
        $result = $this->connection->query($stmt);
        return $result->fetch_assoc();
    }

    private function getAllDates()
    {
        $stmt = 'SELECT date FROM crime_scene_report';
        $result = $this->database->connection->query($stmt);
        return $result->fetch_all();
    }

    public function randomizeDates()
    {
        $result = array_rand($this->getAllDates());
        return $this->getAllDates()[$result][array_rand($this->getAllDates()[$result])];
    }

    private function getAllComputers()
    {
        $stmt = 'SELECT id FROM computers';
        $result = $this->database->connection->query($stmt);
        return $result->fetch_all();
    }

    private function randomizeComputers()
    {
        $result = array_rand($this->getAllComputers());
        return $this->getAllComputers()[$result][array_rand($this->getAllComputers()[$result])];
    }

    private function  changeQuestion()
    {
        implode($this->getQuestion());
    }

    public function generateQuestion() {
        return $this->getQuestion();
    }

}