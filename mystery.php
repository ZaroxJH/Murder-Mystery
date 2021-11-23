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
        <a class="text-black dark:text-gray-200">Druk op één van de knoppen om de tabel daarvan te bekijken.</a>
        <div class="flex flex-wrap">
            <?php foreach ($data->showTables() as $table) {
                echo '
                     <button class="py-2 px-4 mx-1 my-1 bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white max-w-1/2 transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg">'.$table['0'].'</button>
                ';
            } ?>
        </div>
        <div class="container max-w-full">
            <div class="py-3">
                <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                    <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                        <table class="min-w-full leading-normal">
                            <thead>
                            <tr>
                                <th scope="col" class="px-5 py-3 bg-white dark:bg-gray-300 border-b border-gray-600 text-gray-800  text-center text-sm uppercase font-normal">
                                    ID
                                </th>
                                <th scope="col" class="px-5 py-3 bg-white dark:bg-gray-300 border-b border-gray-600 text-gray-800  text-center text-sm uppercase font-normal">
                                    name
                                </th>
                                <th scope="col" class="px-5 py-3 bg-white dark:bg-gray-300 border-b border-gray-600 text-gray-800  text-center text-sm uppercase font-normal">
                                    house_number
                                </th>
                                <th scope="col" class="px-5 py-3 bg-white dark:bg-gray-300 border-b border-gray-600 text-gray-800  text-center text-sm uppercase font-normal">
                                    street_name
                                </th>
                                <th scope="col" class="px-5 py-3 bg-white dark:bg-gray-300 border-b border-gray-600 text-gray-800  text-center text-sm uppercase font-normal">
                                    postal_code
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($data->getPeople() as $person){
                                echo '
                                <tr class="text-center">
                                    <td class="px-5 py-5 border-b border-gray-600 bg-white dark:bg-gray-300 text-sm">
                                        <div class="flex items-center">
                                            <div class="ml-3">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    '.$person['0'].'
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-600 bg-white dark:bg-gray-300 text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            '.$person['1'].'
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-600 bg-white dark:bg-gray-300 text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            '.$person['2'].'
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-600 bg-white dark:bg-gray-300 text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            '.$person['3'].'
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-600 bg-white dark:bg-gray-300 text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            '.$person['4'].'
                                        </p>
                                    </td>
                                </tr>
                                ';}
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</body>

</html>
