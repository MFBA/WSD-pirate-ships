
<?php
session_start();

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $team = $_SESSION['team'];

    $connection_user = new mysqli('localhost', 'root', '', 'users');
    $connection_board = new mysqli("localhost", "root", "", "board");

    // getting shipcell
    $sql = "SELECT * FROM user WHERE team='$team'";
    $result = mysqli_query($connection_user, $sql);
    if (!$result) die($connection_user->error);
    $row_user = mysqli_fetch_assoc($result);
    $shipcell = $row_user['shipcell'];

    // getting board and updating
    $sql = "SELECT * FROM board";
    $result = mysqli_query($connection_board, $sql);
    if (!$result) die($connection_board->error);
    $rows = mysqli_num_rows($result);

    if ($rows == 0) {
        for ($i = 0; $i < 100; $i++) {
            $sql = "INSERT INTO board (cell, team, redships, greenships, yellowships) VALUES ('$i', '', '0', '0', '0')";
            $result = mysqli_query($connection_board, $sql);
            if (!$result) die($connection_board->error);
        }
    } else {
        for ($i = 0; $i < $rows; $i++) {

            $sql = "SELECT count(*) as greenships FROM user WHERE shipcell=$i AND team='Green'";
            $result_user = mysqli_query($connection_user, $sql);
            if (!$result) die($connection_user->error);
            $row_user = mysqli_fetch_assoc($result_user);
            $greenships = $row_user['greenships'];

            $sql = "SELECT count(*) as redships FROM user WHERE shipcell=$i AND team='Red'";
            $result_user = mysqli_query($connection_user, $sql);
            if (!$result) die($connection_user->error);
            $row_user = mysqli_fetch_assoc($result_user);
            $redships = $row_user['redships'];


            $sql = "SELECT count(*) as yellowships FROM user WHERE shipcell=$i AND team='Yellow'";
            $result_user = mysqli_query($connection_user, $sql);
            if (!$result) die($connection_user->error);
            $row_user = mysqli_fetch_assoc($result_user);
            $yellowships = $row_user['yellowships'];

            $row = mysqli_fetch_assoc($result);
            $cell = $row['cell'];
            $team = $row['team'];


            if (($team == "Red")) {
                if ($redships >= $greenships && $redships >= $yellowships) {
                    if ($cell == $shipcell) {
                        echo "<div class='cell red' id='$cell'><img src='images/ship.png' alt='ship' class='ship'>$redships</div>";
                    } else {
                        echo "<div class='cell red' id='$cell'>$redships</div>";
                    }
                } else if ($greenships >= $redships && $greenships >= $yellowships) {
                    if ($cell == $shipcell) {
                        echo "<div class='cell green' id='$cell'><img src='images/ship.png' alt='ship' class='ship'>$greenships</div>";
                    } else {
                        echo "<div class='cell green' id='$cell'>$greenships</div>";
                    }
                } else if ($yellowships >= $redships && $yellowships >= $greenships) {
                    if ($cell == $shipcell) {
                        echo "<div class='cell yellow' id='$cell'><img src='images/ship.png' alt='ship' class='ship'>$yellowships</div>";
                    } else {
                        echo "<div class='cell yellow' id='$cell'>$yellowships</div>";
                    }
                } else {
                    if ($cell == $shipcell) {
                        echo "<div class='cell red' id='$cell'><img src='images/ship.png' alt='ship' class='ship'>$redships</div>";
                    } else {
                        echo "<div class='cell red' id='$cell'>$redships</div>";
                    }
                }
            } else if ($team == "Green") {
                if ($redships > $greenships && $redships > $yellowships) {
                    if ($cell == $shipcell) {
                        echo "<div class='cell red' id='$cell'><img src='images/ship.png' alt='ship' class='ship'>$redships</div>";
                    } else {
                        echo "<div class='cell red' id='$cell'>$redships</div>";
                    }
                } else if ($greenships > $redships && $greenships > $yellowships) {
                    if ($cell == $shipcell) {
                        echo "<div class='cell green' id='$cell'><img src='images/ship.png' alt='ship' class='ship'>$greenships</div>";
                    } else {
                        echo "<div class='cell green' id='$cell'>$greenships</div>";
                    }
                } else if ($yellowships > $redships && $yellowships > $greenships) {
                    if ($cell == $shipcell) {
                        echo "<div class='cell yellow' id='$cell'><img src='images/ship.png' alt='ship' class='ship'>$yellowships</div>";
                    } else {
                        echo "<div class='cell yellow' id='$cell'>$yellowships</div>";
                    }
                } else {
                    if ($cell == $shipcell) {
                        echo "<div class='cell green' id='$cell'><img src='images/ship.png' alt='ship' class='ship'>$greenships</div>";
                    } else {
                        echo "<div class='cell green' id='$cell'>$greenships</div>";
                    }
                }
            } else if ($team == "Yellow") {
                if ($redships >= $greenships && $redships >= $yellowships) {
                    if ($cell == $shipcell) {
                        echo "<div class='cell red' id='$cell'><img src='images/ship.png' alt='ship' class='ship'>$redships</div>";
                    } else {
                        echo "<div class='cell red' id='$cell'>$redships</div>";
                    }
                } else if ($greenships >= $redships && $greenships >= $yellowships) {
                    if ($cell == $shipcell) {
                        echo "<div class='cell green' id='$cell'><img src='images/ship.png' alt='ship' class='ship'>$greenships</div>";
                    } else {
                        echo "<div class='cell green' id='$cell'>$greenships</div>";
                    }
                } else if ($yellowships >= $redships && $yellowships >= $greenships) {
                    if ($cell == $shipcell) {
                        echo "<div class='cell yellow' id='$cell'><img src='images/ship.png' alt='ship' class='ship'>$yellowships</div>";
                    } else {
                        echo "<div class='cell yellow' id='$cell'>$yellowships</div>";
                    }
                }
            } else {
                if ($cell == $shipcell) {
                    echo "<div class='cell' id='$cell'><img src='images/ship.png' alt='ship' class='ship'>$greenships$redships</div>";
                } else {
                    echo "<div class='cell' id='$cell'></div>";
                }
            }
        }
    }
} else {
    header("Location: landing-page.html");
    exit();
}
