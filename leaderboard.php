<?php

// Connect to the database
$connection = mysqli_connect('localhost', 'root', '', 'board');

// Get the number of cells owned by each team from the database
$query = "SELECT team, COUNT(*) as count FROM board GROUP BY team";
$result = $connection->query($query);
$leaderboard = array();
while ($row = $result->fetch_assoc()) {
    $leaderboard[$row['team']] = $row['count'];
}
// Return the leaderboard as a JSON object
header('Content-Type: application/json');
echo json_encode($leaderboard);