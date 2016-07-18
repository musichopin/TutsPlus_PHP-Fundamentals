<?php

require 'config.php';

/*not preferred method:*/
# mysqli_connect('localhost', 'username', 'password');

$letter = 'J'; // temporary, normally comes from the userinput

$id = 3; // temporary, normally comes from the userinput

try {
	$conn = new PDO('mysql:host=localhost;dbname=practice', $config['DB_USERNAME'], $config['DB_PASSWORD']);
	/*mysql: db type (changeable), localhost: host type, practice: db we are connecting to, */

	/*sets the attribute for the connection/sets the error mode: default error mode for pdo is gonna be sth called ERRMODE_SILENT. what this means is that we will have to manually fetch any errors. PDO::ATTR_ERRMODE becomes equal to PDO::ERRMODE_EXCEPTION*/
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	// 1. Query Method: Anti-Pattern, there is an injection threat despite the quote method when there is user input. better way is to use prepared statements for user input. query method is acceptable for hardcoding the entire string
	// $results  = $conn -> query('SELECT * FROM users WHERE id = ' . $conn->quote($id));
	// // mysql yöntemine benzer

	// //print_r($results);
	// foreach ($results as $row) {
	// 		print_r($row); // md array olduğundan print_r loop içerisinde kullanıldı
	// }



	/* 2. Prepared sta: much safer for user input. bc the data we are binding to the query is never actually embedded into the query*/
	/*:id: placeholder, spot where we bind the value to it*/
	$stmt  = $conn -> prepare('SELECT * FROM users WHERE id = :id');

	// we bind id to the id variable we created earlier. the value in id variable is not embedded to the query
	$stmt->execute(array('id'=>$id));
	// alt:
	// $stmt->bindParam(':id', $id, PDO::PARAM_INT);
	// $stmt->execute();
	while($row = $stmt->fetch()) {
		print_r($row);
		// echo $row->user_name . "<br>"; demek için
		// fetch(PDO::FETCH_OBJ) olması gerekir
	}
	echo "<br>";

	// 2.b String input
	$stmt  = $conn -> prepare('SELECT * FROM users WHERE user_name LIKE :letter');
	// $stmt  = $conn -> prepare('SELECT * FROM users WHERE user_name LIKE "J%"');
	// $stmt  = $conn -> prepare('SELECT * FROM users WHERE user_name LIKE "_r%"');

	// $stmt->setFetchMode(PDO::FETCH_OBJ);
	// $stmt->setFetchMode(PDO::FETCH_ASSOC);
	$stmt->execute(array(
		'letter' => $letter . '%'
	));
	// alt:
	// $stmt(':letter', $letter, PDO::PARAM_STR);
	// $stmt->execute();
	// Will throw reference error:
	// $stmt(':letter', $letter . '%', PDO::PARAM_STR);
	// $stmt->execute();

	while($row = $stmt->fetch()) {
	// while($row = $stmt->fetch(PDO::FETCH_OBJ)) {
	// while($row = $stmt->fetch(PDO::ASSOC)) {
	print_r($row);
	}
	// alt:
	// $result = $stmt->fetchAll();
	// print_r($result); // md array print eder
	// foreach ($result as $row) {
	// 		print_r($row); // single d array print eder
	// }



	/*
	// Inserting data
	$stmt = $conn->prepare('INSERT INTO users(user_name) VALUES(:username)');
	// we are not fethcing but inserting this time

	$stmt->bindParam('username', $username, PDO::PARAM_STR);
	// $username 'AmyDoe';
	// $stmt->execute();	
	// $username 'BobbyDoe';
	// $stmt->execute();	
	// $username 'CliffDoe';
	// $stmt->execute();

	// alt: Multiple bindings. Cool, huh?
	$users = array('AmyDoe', 'BobbyDoe', 'CliffDoe');
	foreach($users as $username) {
		$stmt->execute();
	}
	*/


	
} catch(PDOException $e) {
	echo 'ERROR: ' . $e->getMessage();
}