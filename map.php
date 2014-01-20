<?php
// How i like to load shit.
require_once('classes/init.class.php');

$SID = (isset($_GET['Servers'])) ? $_GET['Servers'] : '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    header('Content-Type: application/json');

    echo $request = json_decode($_POST['request']);

    exit;
}

if (!@$SID)
{
	echo $map->server_form();
	var_dump($_POST);

} else {
	var_dump($map::list_coords(323,''));
}