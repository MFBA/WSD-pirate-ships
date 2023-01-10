<?php
session_start();

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $team = $_SESSION['team'];

    $connection_chat = new mysqli('localhost', 'root', '', 'chat');
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title></title>
        <style>
            div {
                border: 1px solid black;
            }

            .layout {
                margin: 10px;
                width: 50%;
                height: 60vh;
                float: left;
                display: grid;
                grid-template-columns:
                    1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr;
                grid-template-rows: 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr;
                gap: 0px 0px;
            }

            .cell {
                background-color: skyblue;
            }

            .info {
                padding: 1%;
                margin: 5px;
                width: 20%;
                height: 60vh;
                float: left;
            }

            .chat {
                width: 20%;
                margin: 5px;
                position: relative;
                padding: 1%;
                height: 60vh;
                float: left;
            }

            .messages {
                width: 100%;
                height: 50vh;
                overflow-y: scroll;

            }


            img {
                margin: 2px;
            }

            .enter {
                position: absolute;
                bottom: 0;
            }

            .red {
                background-color: red;
                animation-name: red;
            }

            .yellow {
                background-color: yellow;
                animation-name: red;
            }

            .green {
                background-color: green;
            }

            .ship {
                width: 30px;
            }
        </style>
    </head>

    <body>
        <p style="text-align: right" title="playername">
            <span style="background-color: <?php echo $_SESSION['team']; ?>"><?php echo $_SESSION['username']; ?></span>
        </p>

        <p style="text-align: right"><a href="logout.php">Logout</a></p>
        <br /><br />
        <div class="layout">

        </div>
        <div class="info">
            <p class="location"></p>
            <p class="leaderboard"></p>
            <p class="online"></p>
        </div>
        <div class="chat">
            <h3>Chat</h3>
            <div class='messages'>

            </div>
            <form method='post'>
                <input id='message-box' type='text' name='message' placeholder='Enter message' required>
                <input id='submit-chat' type='submit' value='Send'>
            </form>
        </div>
        <!--How to play: Click on a cell to move your ship there. You can take over a cell if the number of your teams ships on location is greater than the number of ships belonging to the other teams. E.g., 3 yellow and 1 red is owned by yellow; 1 red only is owned by red; 1 red and 1 blue, owned by whoever has reached there last.-->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

        <script>
            document.querySelector("#submit-chat").addEventListener("click", function(e) {
                e.preventDefault();
                const message = document.querySelector('#message-box');
                const xhr = new XMLHttpRequest();
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        message.value = "";
                    }
                }
                xhr.open("GET", "chat.php?message=" + message.value, true);
                xhr.send();
            })
            setInterval(function() {

                const xhr = new XMLHttpRequest();
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        document.querySelector(".layout").innerHTML = xhr.responseText;
                    }
                }
                xhr.open("GET", "getboard.php", true);
                xhr.send();

            }, 1400)
            setInterval(function() {
                $(document).ready(function() {
                    let xhr = new XMLHttpRequest();
                    xhr.onload = function() {
                        if (xhr.status === 200) {
                            document.querySelector(".location").innerHTML = "<strong>Your Location: </strong>" + xhr.responseText;
                        }
                    }
                    xhr.open("GET", "location.php", true);
                    xhr.send();

                    const cells = document.querySelectorAll(".cell");
                    cells.forEach(function(cell) {
                        cell.addEventListener("click", function() {
                            let xhr = new XMLHttpRequest();
                            xhr.onload = function() {
                                if (xhr.status === 200) {
                                    console.log(xhr.responseText);
                                    xhr.open("GET", "getboard.php", true);
                                }
                            }
                            xhr.open("GET", "colorchange.php?cell=" + cell.id, true);
                            xhr.send();
                        })
                    })
                });
            }, 1000)
            setInterval(function() {
                let xhr = new XMLHttpRequest();
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        const leaderboard = JSON.parse(xhr.responseText);
                        const unoccupied = 100 - (leaderboard.Red || 0) - (leaderboard.Yellow || 0) - (leaderboard.Green || 0);
                        document.querySelector(".leaderboard").innerHTML = "<strong>Territory leaderboard:</strong><br>" +
                            "Team red: " + (leaderboard.Red || 0) + "<br>" +
                            "Team yellow: " + (leaderboard.Yellow || 0) + "<br>" +
                            "Team green: " + (leaderboard.Green || 0) +
                            "<br><br><strong>Unoccupied cells: </strong>" + unoccupied + "<br>"
                    }
                }
                xhr.open("GET", "leaderboard.php", true);
                xhr.send();
            }, 300);

            setInterval(function() {
                // Send a request to the server to get the number of players online
                let xhr = new XMLHttpRequest();
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        // Parse the response from the server (a JSON object)
                        const players = JSON.parse(xhr.responseText);
                        // Update the online p element with the number of players online
                        document.querySelector(".online").innerHTML = "<strong>Players online:</strong><br>" +
                            "Team red: " + (players.Red || 0) + "<br>" +
                            "Team yellow: " + (players.Yellow || 0) + "<br>" +
                            "Team green: " + (players.Green || 0);
                    }
                }
                xhr.open("GET", "players.php", true);
                xhr.send();
            }, 2000);

            setInterval(function() {
                const xhr = new XMLHttpRequest();
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        document.querySelector(".messages").innerHTML = xhr.responseText;
                        document.querySelector(".messages").scrollTop = document.querySelector(".messages").scrollHeight;
                    }
                }
                xhr.open("GET", "getchat.php", true);
                xhr.send();
            }, 100)
        </script>
    </body>

    </html>
<?php } else {
    header("Location: landing-page.html");
}
?>