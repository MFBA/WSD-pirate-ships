<form action="sign-up.php" method="post">
    <table>
        <tr>
            <td>Username:</td>
            <td><label for="username"></label><input type="text" name="username" id="username"></td>
        </tr>
        <tr>
            <td>Password:</td>
            <td><label for="password"></label><input type="text" name="password" id="password"></td>
        </tr>
        <tr>
            <td>Confirm Password:</td>
            <td><label for="repeat_password"></label><input type="text" name="repeat_password" id="repeat_password"></td>
        </tr>
        <tr>
            <td>Pick your team:</td>
            <td><label for="team"></label><select id="team" name="team">
                    <option>Red</option>
                    <option>Green</option>
                    <option>Yellow</option>
                </select></td>
        </tr>
    </table>
    <br></br>
    <button type="submit">Sign me up!</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $db_server = 'localhost';
    $db_username = 'root';
    $db_password = '';
    $db_database = 'users';

    $connection = mysqli_connect($db_server, $db_username, $db_password, $db_database);
    if (!$connection) die($connection->error);
    function add_user($connection, $n, $o, $t): void
    {
        $randomnumber = rand(-1, 100);
        $query = "INSERT INTO user (username, password, team, shipcell,Online) VALUES ('$n', '$o', '$t', $randomnumber,0)";
        $result = mysqli_query($connection, $query);
        if ($result) {
            header("Location:login.html");
        }
        die($connection->error);
    }
    $username = $_POST['username'];
    if ($_POST['password'] == $_POST['repeat_password']) {
        $password = $_POST['password'];
    }
    $team = $_POST['team'];

    $salt1 = "qm&h*";
    $salt2 = "pg!@";
    $token = hash('sha256', "$salt1$password$salt2");

    add_user($connection, $username, $token, $team);
}
?>