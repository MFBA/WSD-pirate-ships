<?php

$db_server = 'localhost';
$db_username = 'root';
$db_password = '';
$db_database = 'users';

$connection = mysqli_connect($db_server, $db_username, $db_password, $db_database);
if (!$connection) die($connection->error);

session_start();

if (isset($_POST['uname']) && isset($_POST['password'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);
    $salt1 = "qm&h*";
    $salt2 = "pg!@";
    $token = hash('sha256', "$salt1$pass$salt2");
    $pass = $token;
    if (empty($uname)) {
        echo "User name is required";
        exit();
    } else if (empty($pass)) {
        echo "Password is required";
        exit();
    } else {
        $sql = "SELECT * FROM user WHERE username='$uname' AND password='$pass'";
        $result = mysqli_query($connection, $sql);
        if (!$result) die($connection->error);
        $row = mysqli_fetch_assoc($result);
        if (!$row) {
            echo "Incorrect User name or password";
            exit();
        } elseif ($row['username'] === $uname && $row['password'] === $pass) {
            echo "Logged in!";
            $_SESSION['username'] = $row['username'];
            $_SESSION['team'] = $row['team'];
            header("Location: home.php");
        }
    }
}
// else {

//     header("Location: landing-page.html");

//     exit();
// }