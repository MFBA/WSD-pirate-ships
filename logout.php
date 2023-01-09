

<?php

$db_server = 'localhost';
$db_username = 'root';
$db_password = '';
$db_database = 'users';

$connection = mysqli_connect($db_server, $db_username, $db_password, $db_database);

if (!$connection) die($connection->error);


session_start();
session_destroy();
header("Location:landing-page.html");
exit();
