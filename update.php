<?php 

	if(isset($_GET['submit'])){
		$pdo = new PDO('mysql:host=localhost;dbname=php_pentastagiu', 'raluca', 'raluca');

		$stmt = $pdo->prepare("UPDATE books SET title = :dTitle, author = :dAuthor, publisher_name = :dPublisher, publish_year = :dYear, updated_at = now() where id = :dId");

		$stmt->bindParam(':dTitle', $gTitle);
		$stmt->bindParam(':dAuthor', $gAuthor);
		$stmt->bindParam(':dPublisher', $gPublisher);
		$stmt->bindParam(':dYear', $gYear);
		$stmt->bindParam(':dId', $gId);

		$gTitle = $_GET['title'];
		$gAuthor = $_GET['author'];
		$gPublisher = $_GET['publisher'];
		$gYear = $_GET['year'];
		$gId = $_GET['id'];

		$stmt->execute();

		$pdo = null;
		
		header("Location: index.php");

	}

 ?>