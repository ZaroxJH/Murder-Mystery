<?php

include 'main_database.php';

class login
{
    private $status = true;
    private $user_id = '';
    private $password_hash = '';
    private $database = [];

    function __construct($name)
    {
        $this->database = new main_database();
            $stmt = $this->database->connection->prepare('SELECT * FROM `users`  WHERE `username` = ?');
            $stmt->bind_param('s', $name);
            $stmt->execute();
            $result = $stmt->get_result();

        if ($result->num_rows == 0) {
            $this->status = false;
        }
        $result = $result->fetch_assoc(); //this has to be located under the above "if" because ->num_rows doesn't work on arrays

        if ($this->status) {

            $this->password_hash = $result['password'];
            $this->user_id = $result['id'];
            $this->name = $name;
        } else {
            $_SESSION['notification'] = 'Onjuiste gebruikersnaam en/of wachtwoord.';
            $_SESSION['message_type'] = false;
            header("location: ../login.php");
            exit();
        }
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function getUsername()
    {
        return $this->name;
    }

    public function comparePassword($password): bool
    {
        if (password_verify($password, $this->password_hash)) {
            $_SESSION['Je bent succesvol ingelogd!'];
            $_SESSION['message_type'] = true;
            return true;
        } else {
            return false;
        }
    }
}