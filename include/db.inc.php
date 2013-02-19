<?php
$hostname_modulatemedia = "localhost";// Database hostname or ip
$database_modulatemedia = "evomap"; //Database name
$username_modulatemedia = "root"; //Database user
$password_modulatemedia = ""; //Database password
$modulatemedia = mysql_pconnect($hostname_modulatemedia, $username_modulatemedia, $password_modulatemedia) or trigger_error(mysql_error(),E_USER_ERROR); 
?>