
<!doctype html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Super Globals</h1>
	<?php 

	// var_dump($_GET);
	// echo $_GET['name'];
	/*get is used for fetching data*/

	/*might be used to fetch a specific article*/
	/*for security we gotta run everything we echo from the query string with a special function named htmlspecialchars*/
	// if( isset($_GET['id']) ) {
	// 	echo htmlspecialchars($_GET['id']);
	// } else {
	// 	echo 'Redirect somewhere';
		/*header function is used*/
	// }

	?>

	<a href="about.php?name=joe">About</a>
	<!-- we are sending the info through the query string -->
</body>
</html>