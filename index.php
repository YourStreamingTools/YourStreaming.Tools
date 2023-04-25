<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>YourBotsOnline API</title>
	<link rel="icon" href="img/logo.png" type="image/png" />
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<div class="container">
		<h1>YourStreamingTools API</h1>
		<p><em>We kindly remind you that access to our server requires a pre-generated key.<br>If you don't have one, please signup using the signup button</em></p>
		<br>
		<p>We're currently supporting the following APIs:</p>
		<ul>
			<li><a href="?api=Time" class="api-link">Time</a></li>
			<li><a href="?api=Weather" class="api-link">Weather</a></li>
			<li><a href="?api=Todo-list" class="api-link">Todo list</a></li>
		</ul>
		<div class="api-info">
			<?php
				if (isset($_GET['api'])) {
					$api = $_GET['api'];
					switch ($api) {
						case 'Time':
							echo "<p>This API provides the current time in various timezones.<br>";
							echo "Usage is time.php?timezone=Australia/Sydney&api=API_KEY</p>";
							echo "</p>";
							break;
						case 'Weather':
							echo "<p>This API provides the current weather conditions for a given location.<br>";
							echo "Usage is weather.php?city=Sydney&api=API_KEY</p>";
							echo "</p>";
							break;
						case 'Todo-list':
							echo "<p>This API allows users to create and manage todo lists.<br>";
							echo "Check it out here: <a href='https://yourlist.online/' target='_blank'>YourList.Online</a>";
							echo "</p>";
							break;
						default:
							echo "<p>Please select an API above to view it's information.</p>";
					}
				} else {
					echo "<p>Please select an API above to view it's information.</p>";
				}
			?>
		</div>
	</div>
</body>
</html>