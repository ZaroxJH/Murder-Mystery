<?php

require_once "../classes/data.php";
require_once "../classes/grids.php";

$data = new data();
$table = new grids();

switch ($_POST['table_name']) {
    case 'computers':
        $headers = ['id', 'serial_number', 'brand'];
        echo $table->createTable($headers, $data->getComputers());
    break;
    case 'computer_used_by':
        $headers = ['computer_id', 'discord_id'];
        echo $table->createTable($headers, $data->getComputerUsedBy());
    break;
    case 'crime_scene_report':
        $headers = ['date', 'type', 'description', 'city'];
        echo $table->createTable($headers, $data->getCrimeSceneReport());
    break;
    case 'discord_profile':
        $headers = ['id', 'person_id', 'username', 'tag'];
        echo $table->createTable($headers, $data->getDiscordProfile());
    break;
    case 'event':
        $headers = ['city', 'team_id'];
        echo $table->createTable($headers, $data->getEvent());
    break;
    case 'person':
        $headers = ['id', 'name', 'house_number', 'street_name', 'postal_code'];
        echo $table->createTable($headers, $data->getPeople());
    break;
    case 'teams':
        $headers = ['id', 'team_name', 'arrived_at'];
        echo $table->createTable($headers, $data->getTeams());
    break;
    case 'team_members':
        $headers = ['team_id', 'discord_id'];
        echo $table->createTable($headers, $data->getTeamMembers());
    break;
    case 'transport_method':
        $headers = ['discord_id', 'car', 'bike', 'bus'];
        echo $table->createTable($headers, $data->getTransportMethod());
    break;
    default:
        $_SESSION['error'] = 'Oeps er ging iets mis!';
    break;
}