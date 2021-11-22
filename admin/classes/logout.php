<?php

class logout
{
    function __construct()
    {
        unset($_SESSION['loggedIn']);
        unset($_SESSION['username']);
        unset($_SESSION['user_id']);
        session_destroy();
        header("location: ../login.php");
        exit();
    }
}