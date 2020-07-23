<?php 

	$pdo = new PDO('mysql:host=localhost;dbname=php_pentastagiu', 'raluca', 'raluca');

	$stmt = $pdo->prepare("DELETE FROM books WHERE id = :dId");
	$stmt->bindParam(':dId', $gId);
	$gId = $_POST['id'];
	$stmt->execute();

	$pdo = null;

	header("Location: index.php");

	echo "hello";
 ?>