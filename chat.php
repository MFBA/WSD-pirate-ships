<?php
session_start();

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $team = $_SESSION['team'];
    $message = $_GET['message'];

    $connection = new mysqli('localhost', 'root', '', 'chat');

    $sql = "INSERT INTO chat (username, message, team) VALUES ('$username', '$message', '$team')";

    $result = mysqli_query($connection, $sql);
    if (!$result) die($connection->error);

    // header("Location: home.php");
} else {
    header("Location: landing-page.html");
    exit();
}
