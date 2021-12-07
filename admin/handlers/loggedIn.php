<?php

if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']) {
    if ($_SERVER['REQUEST_URI'] === '/MurderMystery/admin/login.php') {
        header("location: dashboard.php");
        exit();
    }
}

if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] === false) {
    if ($_SERVER['REQUEST_URI'] != '/MurderMystery/admin/login.php') {
        header("location: login.php");
        exit();
    }boop
}