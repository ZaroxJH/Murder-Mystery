<?php

session_start();

include '../classes/loggedIn.php';
$loggedIn = new loggedIn();

$loggedIn->checkLoginOnPage();

include '../classes/login.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = new login($_POST['name']);

    if ($login->comparePassword($_POST['password'])) {
        $_SESSION['loggedIn'] = true;
        $_SESSION['user_id'] = $login->getUserId();
        $_SESSION['username'] = $login->getUsername();
        header("location: ../dashboard.php");
        exit();
    } else {
        $_SESSION['notification'] = 'Onjuiste gebruikersnaam en/of wachtwoord.';
        $_SESSION['message_type'] = false;
        header("location: ../login.php");
        exit();
    }
}