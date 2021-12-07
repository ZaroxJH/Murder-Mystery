<?php

require_once "classes/data.php";

$data = new data();

?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Stefan Hoekstra">
    <link rel="icon" type="image/x-icon" href="assets/img/icon-hacker.png">

    <title>Mystery</title>

    <link href="assets/css/tailwind.css" rel="stylesheet" media="all">
    <link href="assets/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="assets/fontawesome/css/solid.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="assets/js/main.js"></script>

</head>

<body class="flex flex-col items-center justify-center h-screen background">

<div class="flex flex-col items-center w-3/4 h-screen bg-white dark:bg-gray-800 overflow-auto">

    <div class="flex flex-col w-3/4 py-8">

        <div class="w-full mb-2">
            <h3 class="text-2xl text-black dark:text-white">Welkom bij SQL Murder Mystery</h3>
            <a class="text-black dark:text-gray-200">Hieronder krijg je een ERD te zien van de database waar je in gaat zoeken.</a>
        </div>

        <div>
            <img src="assets/img/ERD.png">
        </div>

    </div>

    <div class="flex flex-col w-3/4 justify-center items-center">
        <h3 class="text-2xl text-black dark:text-white">Welke tabel wil je bekijken?</h3>
        <a class="text-black dark:text-gray-200 mb-4">Druk op één van de knoppen om de tabel daarvan te bekijken.</a>
        <div class="flex flex-wrap justify-center">
            <?php foreach ($data->showTables() as $table) {
                echo '
                     <button onclick="loadTest(\''.$table['0'].'\')" class="py-2 px-4 mx-1 my-1 bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white max-w-1/2 transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg">'.$table[0].'</button>
                ';
            } ?>
        </div>
        <div class="container max-w-full">
            <div class="py-3">
                <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">

                    <div class="flex relative">
                        <span class="rounded-l-md inline-flex  items-center px-3 border-t bg-white border-l border-b  border-gray-300 text-gray-500 shadow-sm text-sm">
                            <i class="fas fa-search"></i>
                        </span>
                        <input type="text" id="search" class=" rounded-r-lg flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" name="email" placeholder="Your email"/>
                    </div>

                    <div id="tableContent" class="inline-block min-w-full shadow rounded-lg overflow-hidden display dataTable">

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</body>

</html>
