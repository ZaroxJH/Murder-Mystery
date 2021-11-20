<?php

?>

<!DOCTYPE html>
<html lang="nl">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Stefan Hoekstra">

    <link href="assets/css/tailwind.css" rel="stylesheet" media="all">
    <script src="assets/navbar.js"></script>
<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
    <link href="assets/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="assets/fontawesome/css/solid.css" rel="stylesheet">

</head>

<body class="food overflow-x-hidden">
<nav class='bg-white dark:bg-gray-800 shadow w-screen'>
    <div class='max-w-7xl mx-auto px-8'>
        <div class='flex items-center justify-between h-16'>
            <div class='flex items-center truncate'>
                <a href="index.php">
                    <img class='h-50 w-40' alt="" src='../img/logo.png'/>
                </a>
            </div>
            <div class='block'>
                <div class='ml-4 flex items-center md:ml-6'>
                    <div class='ml-3 relative'>
                        <div class='relative inline-block text-left'>
                            <div onclick="toggleProfileButton()">
                                <button type='button' class='text-black dark:text-white flex items-center justify-center w-full'
                                        id='options-menu'><?= $_SESSION['username'] ?><i class="fas fa-arrow-down"></i>
                                </button>
                            </div>
                            <div id='profile-dropdown'
                                 class='z-50 hidden origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white dark:bg-gray-700 ring-1 ring-black ring-opacity-5'>
                                <div class='py-1 ' role='menu' aria-orientation='vertical'
                                     aria-labelledby='options-menu'>
                                    <a href='producten.php'
                                       class='block px-4 py-2 text-md text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 hover:text-gray-900 transition-colors'
                                       role='menuitem'>
                                                    <span class='flex flex-col'>
                                                        <span class="text-black dark:text-white ">
                                                            Producten
                                                        </span>
                                                    </span>
                                    </a>
                                    <a href='account.php'
                                       class='block px-4 py-2 text-md text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 hover:text-gray-900  transition-colors'
                                       role='menuitem'>
                                                    <span class='flex flex-col'>
                                                        <span class="text-black dark:text-gray-200">
                                                            Account
                                                        </span>
                                                    </span>
                                    </a>
                                    <a href='logout.php'
                                       class='block px-4 py-2 text-md text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 hover:text-gray-900 transition-colors'
                                       role='menuitem'>
                                                    <span class='flex flex-col'>
                                                        <span class="text-black dark:text-gray-200">
                                                            Uitloggen
                                                        </span>
                                                    </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</nav>