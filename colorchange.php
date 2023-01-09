
<?php
session_start();

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $team = $_SESSION['team'];
    $cell = $_GET['cell'];

    $connection = new mysqli('localhost', 'root', '', 'board');
    $connection_user = new mysqli('localhost', 'root', '', 'users');


    //user
    $sql_user = "UPDATE user SET shipcell='$cell' WHERE username='$username'";
    $result_user = mysqli_query($connection_user, $sql_user);
    if (!$result_user) die($connection_user->error);



    //board
    $sql_user = "SELECT * FROM user WHERE username='$username'";
    $result_user = mysqli_query($connection_user, $sql_user);
    if (!$result_user) die($connection_user->error);
    $row_user = mysqli_fetch_assoc($result_user);
    $shipcell = $row_user['shipcell'];


    $sql = "SELECT * FROM board";
    $result = mysqli_query($connection, $sql);
    if (!$result) die($connection->error);
    $rows = mysqli_num_rows($result);

    for ($i = 0; $i < $rows; $i++) {
        $row = mysqli_fetch_assoc($result);
        $cell_board = $row['cell'];
        $team_board = $row['team'];
        $redships = $row['redships'];
        $greenships = $row['greenships'];
        $yellowships = $row['yellowships'];

        if ($cell == !$shipcell) {
            echo "cell is not equal to shipcell";
            if ($team == 'Red') {
                $redships--;
                if ($team_board == 'Green' || $team_board == 'Yellow' || $team_board == '') {
                    $sql = "UPDATE board SET team='$team', redships='$redships' WHERE cell='$cell'";
                }
            } else if ($team == 'Green') {
                $greenships--;
                if ($team_board == 'Green' || $team_board == 'Yellow' || $team_board == '') {
                    $sql = "UPDATE board SET team='$team', greenships='$greenships' WHERE cell='$cell'";
                }
            } else if ($team == 'Yellow') {
                $yellowships--;
                if ($team_board == 'Green' || $team_board == 'Yellow' || $team_board == '') {
                    $sql = "UPDATE board SET team='$team', yellowships='$yellowships' WHERE cell='$cell'";
                }
            }
            $result = mysqli_query($connection, $sql);
            if (!$result) die($connection->error);
        } else {

            if ($team == 'Red') {
                $redships++;
                if ($team_board == 'Green' || $team_board == 'Yellow' || $team_board == '') {
                    $sql = "UPDATE board SET team='$team', redships='$redships' WHERE cell='$cell'";
                }
            } else if ($team == 'Green') {
                $greenships++;
                if ($team_board == 'Red' || $team_board == 'Yellow' || $team_board == '') {
                    $sql = "UPDATE board SET team='$team', greenships='$greenships' WHERE cell='$cell'";
                }
            } else if ($team == 'Yellow') {
                $yellowships++;
                if ($team_board == 'Red' || $team_board == 'Green' || $team_board == '') {
                    $sql = "UPDATE board SET team='$team', yellowships='$yellowships' WHERE cell='$cell'";
                }
            }
        }
    }



    $result = mysqli_query($connection, $sql);
    if (!$result) die($connection->error);
} else {
    header("Location: landing-page.html");
    exit();
}
?>