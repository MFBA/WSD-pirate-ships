<?php
// Connect to the database
$connection = mysqli_connect('localhost', 'root', '', 'users');

// Get the number of players online from the database
$query = "SELECT team, COUNT(Online) as count FROM user WHERE `Online` = 1 GROUP BY team";
$result = $connection->query($query);
$players = array();
while ($row = $result->fetch_assoc()) {
    $players[$row['team']] = $row['count'];
}
// Return the players online as a JSON object
header('Content-Type: application/json');
echo json_encode($players);