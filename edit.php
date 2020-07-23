<!DOCTYPE html>
<html>
<head>
	<title>edit</title>
</head>
<body>

	<?php $pdo = new PDO('mysql:host=localhost;dbname=php_pentastagiu', 'raluca', 'raluca'); ?>

	<h4>Edit book</h4>
	<form action="update.php" method="GET">
		<label>Title:</label>
		<input type="text" name="title">
		<br>
		<label>Author:</label>
		<input type="text" name="author">
		<br>
		<label>Publisher name:</label>
		<input type="text" name="publisher">
		<br>
		<label>Publish year:</label>
		<input type="text" name="year">
		<br>
		<input type="submit" name="submit" value="submit">
		<input type="hidden" name="id" value="<?php echo $_POST['id']; ?>"/>
	</form>
	<br>

	<?php

		$stmt = $pdo->prepare("SELECT title, author, publisher_name, publish_year FROM books WHERE id = :dId", array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
		$stmt->execute(array(':dId' => $_POST['id']));
		$row = $stmt->fetch();

		echo "Title: " . $row['title'] . "<br>";
		echo "Author: " . $row['author'] . "<br>";
		echo "Publisher name: " . $row['publisher_name'] . "<br>";
		echo "Publish year: " . $row['publish_year'];
		
		$pdo = null;
	?>

</body>
</html>