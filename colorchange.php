
<?php
session_start();

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $team = $_SESSION['team'];
    $cell = $_GET['cell'];

    $connection = new mysqli('localhost', 'root', '', 'board');
    $connection_user = new mysqli('localhost', 'root', '', 'users');

    $sql_user = "UPDATE user SET shipcell='$cell' WHERE username='$username'";
    $result_user = mysqli_query($connection_user, $sql_user);
    if (!$result_user) die($connection_user->error);

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
        $cell = $row['cell'];

        if ($shipcell == $cell) {
            $sql = "UPDATE board SET team='$team' WHERE cell='$cell'";
        }
    }

    $result = mysqli_query($connection, $sql);
    if (!$result) die($connection->error);
} else {
    header("Location: landing-page.html");
    exit();
}
?>