<?php 
	
	if(isset($_GET['submit'])){
		$pdo = new PDO('mysql:host=localhost;dbname=php_pentastagiu', 'raluca', 'raluca');

		$stmt = $pdo->prepare("INSERT INTO books (title, author, publisher_name, publish_year, created_at , updated_at) VALUES (:dTitle, :dAuthor, :dPublisher, :dYear, now(), now())");

		$stmt->bindParam(':dTitle', $gTitle);
		$stmt->bindParam(':dAuthor', $gAuthor);
		$stmt->bindParam(':dPublisher', $gPublisher);
		$stmt->bindParam(':dYear', $gYear);

		$gTitle = $_GET['title'];
		$gAuthor = $_GET['author'];
		$gPublisher = $_GET['publisher'];
		$gYear = $_GET['year'];

		$stmt->execute();

		$pdo = null;
		
		header("Location: index.php");

	}

 ?>