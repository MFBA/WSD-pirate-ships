<?php
session_start();
// Connect to the database
$connection = new mysqli('localhost', 'root', '', 'users');

// Get the initial location of the user from the database
$username = $_SESSION['username'];
$query = "SELECT shipcell FROM user WHERE username = '$username'";
$result = $connection->query($query);
$row = $result->fetch_assoc();
$location = $row['shipcell'];

// change location to coordinates in a grid of 10x10
$x = $location % 10;
$y = floor($location / 10);


echo  $x . "," . $y;
