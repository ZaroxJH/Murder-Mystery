<?php

if (isset($_SESSION['notification'])) {
    include "../classes/notification.php";

    $notification = new notification();
    echo $notification->createError($_SESSION['notification'], $_SESSION['message_type']);

    unset($_SESSION['notification']);
    unset($_SESSION['message_type']);
}