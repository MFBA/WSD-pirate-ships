
<?php
session_start();

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $team_session = $_SESSION['team'];

    $connection_user = new mysqli('localhost', 'root', '', 'users');
    $connection_board = new mysqli("localhost", "root", "", "board");

    // getting shipcell
    $sql = "SELECT * FROM user WHERE username='$username'";
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
            $sql = "INSERT INTO board (cell, team) VALUES ('$i', '')";
            $result = mysqli_query($connection_board, $sql);
            if (!$result) die($connection_board->error);
        }
    } else {
        for ($i = 0; $i < $rows; $i++) {

            $sql = "SELECT count(*) as greenships,username FROM user WHERE shipcell=$i AND team='Green'";
            $result_user = mysqli_query($connection_user, $sql);
            if (!$result) die($connection_user->error);
            $row_user = mysqli_fetch_assoc($result_user);
            $greenships = $row_user['greenships'];
            $greenuser  =  $row_user['username'];

            $sql = "SELECT count(*) as redships,username FROM user WHERE shipcell=$i AND team='Red'";
            $result_user = mysqli_query($connection_user, $sql);
            if (!$result) die($connection_user->error);
            $row_user = mysqli_fetch_assoc($result_user);
            $redships = $row_user['redships'];
            $reduser = $row_user['username'];


            $sql = "SELECT count(*) as yellowships,username FROM user WHERE shipcell=$i AND team='Yellow'";
            $result_user = mysqli_query($connection_user, $sql);
            if (!$result) die($connection_user->error);
            $row_user = mysqli_fetch_assoc($result_user);
            $yellowships = $row_user['yellowships'];
            $yellowuser = $row_user['username'];

            $row = mysqli_fetch_assoc($result);
            $cell = $row['cell'];
            $team = $row['team'];


            //first SIGNUP color change
            if ($shipcell == $cell && $team == '') {
                $sql = "UPDATE board SET team='$team_session' WHERE cell=$shipcell";
                $result = mysqli_query($connection_board, $sql);
                if (!$result) die($connection_board->error);
            }
            //

            if (($team == "Red")) {
                if ($redships >= $greenships && $redships >= $yellowships) {
                    if ($cell == $shipcell) {
                        echo "<div class='cell red' title='$greenuser &#013; $reduser  &#013;  $yellowuser'  id='$cell'><img src='images/ship.png' alt='ship' class='ship'></div>";
                    } else {
                        echo "<div class='cell red' title='$greenuser &#013; $reduser  &#013;  $yellowuser'  title='' id='$cell'></div>";
                    }
                } else if ($greenships >= $redships && $greenships >= $yellowships) {
                    if ($cell == $shipcell) {
                        echo "<div class='cell green' title='$greenuser &#013; $reduser  &#013;  $yellowuser'  id='$cell'><img src='images/ship.png' alt='ship' class='ship'></div>";
                    } else {
                        echo "<div class='cell green' title='$greenuser &#013; $reduser  &#013;  $yellowuser'  id='$cell'></div>";
                    }
                } else if ($yellowships >= $redships && $yellowships >= $greenships) {
                    if ($cell == $shipcell) {
                        echo "<div class='cell yellow' title='$greenuser &#013; $reduser  &#013;  $yellowuser'  id='$cell'><img src='images/ship.png' alt='ship' class='ship'></div>";
                    } else {
                        echo "<div class='cell yellow' title='$greenuser &#013; $reduser  &#013;  $yellowuser'  id='$cell'></div>";
                    }
                } else {
                    if ($cell == $shipcell) {
                        echo "<div class='cell red' title='$greenuser &#013; $reduser  &#013;  $yellowuser'  id='$cell'><img src='images/ship.png' alt='ship' class='ship'></div>";
                    } else {
                        echo "<div class='cell red' title='$greenuser &#013; $reduser  &#013;  $yellowuser'  id='$cell'></div>";
                    }
                }
            } else if ($team == "Green") {
                if ($redships > $greenships && $redships > $yellowships) {
                    if ($cell == $shipcell) {
                        echo "<div class='cell red' title='$greenuser &#013; $reduser  &#013;  $yellowuser' id='$cell'><img src='images/ship.png' alt='ship' class='ship'></div>";
                    } else {
                        echo "<div class='cell red' title='$greenuser &#013; $reduser  &#013;  $yellowuser' id='$cell'></div>";
                    }
                } else if ($greenships > $redships && $greenships > $yellowships) {
                    if ($cell == $shipcell) {
                        echo "<div class='cell green' title='$greenuser &#013; $reduser  &#013;  $yellowuser' id='$cell'><img src='images/ship.png' alt='ship' class='ship'></div>";
                    } else {
                        echo "<div class='cell green' title='$greenuser &#013; $reduser  &#013;  $yellowuser' id='$cell'></div>";
                    }
                } else if ($yellowships > $redships && $yellowships > $greenships) {
                    if ($cell == $shipcell) {
                        echo "<div class='cell yellow' title='$greenuser &#013; $reduser  &#013;  $yellowuser' id='$cell'><img src='images/ship.png' alt='ship' class='ship'></div>";
                    } else {
                        echo "<div class='cell yellow' title='$greenuser &#013; $reduser  &#013;  $yellowuser' id='$cell'></div>";
                    }
                } else {
                    if ($cell == $shipcell) {
                        echo "<div class='cell green' title='$greenuser &#013; $reduser  &#013;  $yellowuser' id='$cell'><img src='images/ship.png' alt='ship' class='ship'></div>";
                    } else {
                        echo "<div class='cell green' title='$greenuser &#013; $reduser  &#013;  $yellowuser' id='$cell'></div>";
                    }
                }
            } else if ($team == "Yellow") {
                if ($redships > $greenships && $redships > $yellowships) {
                    if ($cell == $shipcell) {
                        echo "<div class='cell red' title='$greenuser &#013; $reduser  &#013;  $yellowuser' id='$cell'><img src='images/ship.png' alt='ship' class='ship'></div>";
                    } else {
                        echo "<div class='cell red' title='$greenuser &#013; $reduser  &#013;  $yellowuser' id='$cell'></div>";
                    }
                } else if ($greenships > $redships && $greenships > $yellowships) {
                    if ($cell == $shipcell) {
                        echo "<div class='cell green' title='$greenuser &#013; $reduser  &#013;  $yellowuser' id='$cell'><img src='images/ship.png' alt='ship' class='ship'></div>";
                    } else {
                        echo "<div class='cell green' title='$greenuser &#013; $reduser  &#013;  $yellowuser' id='$cell'></div>";
                    }
                } else if ($yellowships > $redships && $yellowships > $greenships) {
                    if ($cell == $shipcell) {
                        echo "<div class='cell yellow' title='$greenuser &#013; $reduser  &#013;  $yellowuser' id='$cell'><img src='images/ship.png' alt='ship' class='ship'></div>";
                    } else {
                        echo "<div class='cell yellow' title='$greenuser &#013; $reduser  &#013;  $yellowuser' id='$cell'></div>";
                    }
                } else {
                    if ($cell == $shipcell) {
                        echo "<div class='cell yellow' title='$greenuser &#013; $reduser  &#013;  $yellowuser' id='$cell'><img src='images/ship.png' alt='ship' class='ship'></div>";
                    } else {
                        echo "<div class='cell yellow' title='$greenuser &#013; $reduser  &#013;  $yellowuser' id='$cell'></div>";
                    }
                }
            } else {
                if ($cell == $shipcell) {
                    echo "<div class='cell' title='$greenuser &#013; $reduser  &#013;  $yellowuser' id='$cell'><img src='images/ship.png' alt='ship' class='ship'></div>";
                } else {
                    echo "<div class='cell' title='$greenuser &#013; $reduser  &#013;  $yellowuser' id='$cell'></div>";
                }
            }
        }
    }
} else {
    header("Location: landing-page.html");
    exit();
}
