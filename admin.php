<!DOCTYPE html>
<html lang="en">



<?php
session_start();
if (isset($_POST['board'])) {

    $db_server = 'localhost';
    $db_username = 'root';
    $db_password = '';
    $db_database = 'board';


    $connection = mysqli_connect($db_server, $db_username, $db_password, $db_database);
    if (!$connection) die($connection->error);

    function delete($connection): void
    {
        $query = "DELETE FROM board";
        $result = mysqli_query($connection, $query);
        if ($result) {
            echo "Reseted cells in board";
        }
        die($connection->error);
    }


    delete($connection);
} else if (isset($_POST['users'])) {

    $db_server = 'localhost';
    $db_username = 'root';
    $db_password = '';
    $db_database = 'users';


    $connection = mysqli_connect($db_server, $db_username, $db_password, $db_database);
    if (!$connection) die($connection->error);

    function delete($connection): void
    {
        $query = "DELETE FROM user";
        $result = mysqli_query($connection, $query);
        if ($result) {
            session_destroy();
            echo "Reseted users in users";
        }
        die($connection->error);
    }
    delete($connection);
} else if (isset($_POST['chat'])) {

    $db_server = 'localhost';
    $db_username = 'root';
    $db_password = '';
    $db_database = 'chat';


    $connection = mysqli_connect($db_server, $db_username, $db_password, $db_database);
    if (!$connection) die($connection->error);

    function delete($connection): void
    {
        $query = "DELETE FROM chat";
        $result = mysqli_query($connection, $query);
        if ($result) {

            echo "Reseted chat in users";
        }
        die($connection->error);
    }
    delete($connection);
} else {
    echo "No button was pressed";
}
?>