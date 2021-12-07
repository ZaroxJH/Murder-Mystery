<?php
require_once "admin/classes/main_database.php";
require_once "data.php";

class question extends main_database
{
    private $database = '';

    function __construct()
    {
        parent::__construct();
        $this->database = new database();
    }

    private function getKeywords()
    {
        $stmt = 'SELECT * FROM questions';
        $result = $this->connection->query($stmt);
        $result = $result->fetch_all();
        $shuffle = array_rand($result);
        return $result[$shuffle];
    }

    private function shufflePerson()
    {
        $stmt = 'SELECT * FROM person';
        $result = $this->database->connection->query($stmt);
        $result = $result->fetch_all();
        $shuffle = array_rand($result);
        return $result[$shuffle];
    }

    private function processPersonKeywords()
    {
        $array = [];
        $keywords = $this->getKeywords()['3'];

        if (str_contains($keywords, 'id')) {
            array_push($array, $this->shufflePerson()[0]);
        }
        if (str_contains($keywords, 'name')) {
            array_push($array, $this->shufflePerson()[1]);
        }
        if (str_contains($keywords, 'hair_color')) {
            array_push($array, $this->shufflePerson()[2]);
        }
        if (str_contains($keywords, 'house_number')) {
            array_push($array, $this->shufflePerson()[3]);
        }
        if (str_contains($keywords, 'street_name')) {
            array_push($array, $this->shufflePerson()[4]);
        }
        if (str_contains($keywords, 'postal_code')) {
            array_push($array, $this->shufflePerson()[5]);
        }

        $string = implode(', ', $array);

//

        $stmt = $this->connection->prepare('INSERT INTO variations (id, keywords) VALUES (?, ?)');
        $stmt->bind_param('is',  $this->getKeywords()['0'],$string);
        $stmt->execute();
    }

    public function testResult()
    {
        return $this->processPersonKeywords();
    }
}