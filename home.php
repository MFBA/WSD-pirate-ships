<?php
session_start();


if (isset($_SESSION['username'])) {
	$username = $_SESSION['username'];
	$team = $_SESSION['team'];

	$connection_chat = new mysqli('localhost', 'root', '', 'chat');
?>


	<!DOCTYPE html>
	<html>

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
			<span style="background-color: yellow"><?php echo $_SESSION['username']; ?></span>
		</p>

		<p style="text-align: right"><a href="logout.php">Logout</a></p>
		<br /><br />
		<div class="layout">

		</div>

		<div class="info">
			Your Location: 4,0 <br /><br />

			<b>Territory leaderboard</b><br />

			Team red: 3 cells<br />
			Team green: 2 cells<br />
			Team yellow: 3 cells<br /><br />

			Unoccupied: 93 cells<br /><br />

			<b>Players online</b><br />
			Team red: 2<br />
			Team green: 1<br />
			Team yellow: 1<br /><br />




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
		</div>


		<!--How to play: Click on a cell to move your ship there. You can take over a cell if the number of your teams ships on location is greater than the number of ships belonging to the other teams. E.g., 3 yellow and 1 red is owned by yellow; 1 red only is owned by red; 1 red and 1 blue, owned by whoever has reached there last.-->

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

		<script>
			document.querySelector("#submit-chat").addEventListener("click", function(e) {
				e.preventDefault();
				const message = document.querySelector('#message-box');
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						message.value = "";
					}
				}
				xmlhttp.open("GET", "chat.php?message=" + message.value, true);
				xmlhttp.send();
			})
			setInterval(function() {

				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

						document.querySelector(".layout").innerHTML = xmlhttp.responseText;
					}
				}
				xmlhttp.open("GET", "getboard.php", true);
				xmlhttp.send();

			}, 1200)
			setInterval(function() {
				const cells = document.querySelectorAll(".cell");
				cells.forEach(function(cell) {
					cell.addEventListener("click", function() {
						var xmlhttp = new XMLHttpRequest();

						xmlhttp.onreadystatechange = function() {
							if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
								console.log(xmlhttp.responseText);
							}
						}
						xmlhttp.open("GET", "colorchange.php?cell=" + cell.id, true);
						xmlhttp.send();
					})
				})
			}, 300)
			setInterval(function() {
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

						document.querySelector(".messages").innerHTML = xmlhttp.responseText;
						document.querySelector(".messages").scrollTop = document.querySelector(".messages").scrollHeight;

					}
				}
				xmlhttp.open("GET", "getchat.php", true);
				xmlhttp.send();
			}, 100)
		</script>
	</body>

	</html>

<?php } else {
	header("Location: landing-page.html");
}
?>