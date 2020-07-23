<!DOCTYPE html>
<html>
<head>
	<title>books</title>
</head>
<body>

	<button onclick="location.href='create.php'" type="button">add a book</button>

	<br>
	<br>

	<table style="width:100%">
		<tr>
			<th>ID</th>
			<th>Title</th>
			<th>Author</th>
			<th>Publisher</th>
			<th>Publish Year</th>
			<th>Created at</th>
			<th>Updated at</th>
			<th>Update</th>
			<th>Delete</th>
		</tr>

		<?php

		$pdo = new PDO('mysql:host=localhost;dbname=php_pentastagiu', 'raluca', 'raluca');
		$sql = "SELECT * FROM books";

		foreach ($pdo->query($sql, PDO::FETCH_ASSOC) as $row) {
			echo "<tr>";
			echo "<th>" . $row['id'] . "</th>";
			echo "<th>" . $row['title'] . "</th>";
			echo "<th>" . $row['author'] . "</th>";
			echo "<th>" . $row['publisher_name'] . "</th>";
			echo "<th>" . $row['publish_year'] . "</th>";
			echo "<th>" . $row['created_at'] . "</th>";
			echo "<th>" . $row['updated_at'] . "</th>";
			echo "<th>" . 
					"<form action='edit.php' method='POST'>" .
						"<input type='submit' name='action' value='edit'>" .
						"<input type='hidden' name='id' value='" . $row['id'] . "'/>" .
					"</form>" .
				 "</th>";
			echo "<th>" . 
					"<form action='delete.php' method='POST'>" .
						"<input type='submit' name='action' value='delete'>" .
						"<input type='hidden' name='id' value='" . $row['id'] . "'/>" .
					"</form>" .
				 "</th>";
			echo "</tr>";
		}

		$pdo = null;

		?>
	</table>

	</body>
	</html>
