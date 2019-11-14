<!DOCTYPE html>
	<html>
	<head>
		<title>LAB07</title>
	</head>
	<body>
	<?php
		$db = new PDO("mysql:dbname=imdb;host=localhost", "root", "1234");

		$rows = $db->query("SELECT * FROM actors WHERE last_name LIKE 'Del%'");

		foreach ($rows as $row) { ?>
			<li> First name: <?= $row["first_name"] ?>,Last name:  <?= $row["last_name"]  ?> </li>
	<?php
		}
	?>
	</body>
</html>