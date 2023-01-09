<?php
session_start();

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $team = $_SESSION['team'];

    $connection_chat = new mysqli('localhost', 'root', '', 'chat');

    if ($connection_chat->connect_error) die($connection_chat->connect_error);

    $sql = "SELECT * FROM chat";

    $result = mysqli_query($connection_chat, $sql);
    if (!$result) die($connection_chat->error);

    $rows = mysqli_num_rows($result);

    for ($j = 0; $j < $rows; $j++) {
        $row = mysqli_fetch_assoc($result);
        $username = $row['username'];
        $message = $row['message'];
        $team = $row['team'];
        echo "<p><span style='background-color: $team'>$username</span>: $message</p>";
    }
} else {
    header("Location: landing-page.html");
    exit();
}
