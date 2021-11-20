<?php

class loggedIn
{

    function __construct()
    {
    }

    public function checkLoginOnPage()
    {
        if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']) {
            header("location: dashboard.php");
            exit();
        }
    }

    public function checkLogin()
    {
        if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] === false) {
            header("location: login.php");
            exit();
        }
    }
}