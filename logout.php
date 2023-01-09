<?php
session_start();
$db_server = 'localhost';
$db_username = 'root';
$db_password = '';
$db_database = 'users';

$connection = mysqli_connect($db_server, $db_username, $db_password, $db_database);

if (!$connection) die($connection->error);
$uname = $_SESSION['username'];
$sql = "UPDATE `user` SET `Online`='0' WHERE username = '$uname'";
mysqli_query($connection, $sql);
session_destroy();
header("Location:landing-page.html");
exit();
