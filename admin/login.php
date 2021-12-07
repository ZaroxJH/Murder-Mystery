<?php

session_start();

require_once 'handlers/LoggedIn.php';
require_once 'classes/notification.php';

$message = new notification();

if (isset($_SESSION['notification'])) {
    echo $message->createError($_SESSION['notification'], $_SESSION['message_type']);
    unset($_SESSION['notification']);
    unset($_SESSION['message_type']);
}

?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Stefan Hoekstra">

    <title>Inloggen</title>

    <link href="assets/css/tailwind.css" rel="stylesheet" media="all">
    <link href="assets/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="assets/fontawesome/css/solid.css" rel="stylesheet">

</head>

<body class="flex flex-col items-center justify-center h-screen food bg-gray-900">

<div class="flex flex-col fixed w-full max-w-md px-4 py-8 max-h-80 bg-white dark:bg-gray-800 rounded-lg shadow-lg sm:px-6 md:px-8 lg:px-10">

    <div class="self-center text-xl font-light text-gray-600 dark:text-white sm:text-2xl">
        Murder Mystery
    </div>

    <div class="self-center text-md font-light text-gray-600 dark:text-gray-300">
        Beheerdersomgeving
    </div>

    <div class="mt-8">
        <form method="post" action="handlers/login.php">
            <div class="flex flex-col mb-2">
                <div class="flex relative ">
                    <span class="rounded-l-md inline-flex items-center px-3 border-t bg-white dark:bg-gray-700 border-l border-b  border-gray-300 dark:border-gray-700 text-gray-500 shadow-sm text-sm" style="width: 40px">
                            <i class="fas fa-user"></i>
                    </span>
                    <input type="text" name="name" id="name" class="dark:text-white rounded-r-lg flex-1 appearance-none border border-gray-300 dark:border-gray-700 w-full py-2 px-4 bg-white dark:bg-gray-600 text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="Gebruikersnaam..."/>
                </div>
            </div>
            <div class="flex flex-col mb-6">
                <div class="flex relative ">
                        <span class="rounded-l-md inline-flex  items-center px-3 border-t bg-white dark:bg-gray-700 border-l border-b  border-gray-300 dark:border-gray-700 text-gray-500 shadow-sm text-sm">
                            <svg width="15" height="15" fill="currentColor" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1376 768q40 0 68 28t28 68v576q0 40-28 68t-68 28h-960q-40 0-68-28t-28-68v-576q0-40 28-68t68-28h32v-320q0-185 131.5-316.5t316.5-131.5 316.5 131.5 131.5 316.5q0 26-19 45t-45 19h-64q-26 0-45-19t-19-45q0-106-75-181t-181-75-181 75-75 181v320h736z">
                                </path>
                            </svg>
                        </span>
                    <input type="password" name="password" id="sign-in-email" class="dark:text-white rounded-r-lg flex-1 appearance-none border border-gray-300 dark:border-gray-700 w-full py-2 px-4 bg-white dark:bg-gray-600 text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="Wachtwoord..."/>
                </div>
            </div>
            <div class="flex w-full">
                <button type="submit" class="py-2 px-4  bg-purple-600 hover:bg-purple-700 focus:ring-purple-500 focus:ring-offset-purple-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                    Login
                </button>
            </div>
        </form>
    </div>
</div>

</body>

</html>
