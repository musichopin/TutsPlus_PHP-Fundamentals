<?php

session_start();
/*session_start must come before every other session statements*/

// Just for now, normally out of database...
/*creates constants*/
define('USERNAME', 'JeffreyWay');
define('PASSWORD', '1234');

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
	// 1. get their values
	$username = $_POST['username'];
	$password = $_POST['password'];

	// 2. validate that against the records (database)
	// this could be abstracted away to a reusable function. in that way when we stored within a function we can call that anytime we need to within the project
	if ( $username === USERNAME && $password === PASSWORD ) {
		// credentials are correct

		// 3. login + set session
		/*we stored in this session, this key username, which would be equal to $username*/
		$_SESSION['username'] = $username;
		header("Location: admin.php"); /* *** directs to admin.php in which we should have access to the username *** */
	} else {
		$status = "Incorrect login credentials.";
	}
	
}

// Detect whether a specific form was submitted
// if ( isset($_POST['loginForm'])) {
// 	echo 'posted';
// }

?>

<!doctype html>
<html>
<head>
	<title></title>
</head>
<body>

<h1>Login</h1>
<form action="login.php" method="post">
	<ul>
		<li>
			<label for="username">Username: </label>
			<input type="text" name="username">
		</li>

		<li>
			<label for="password">Password: </label>
			<input type="password" name="password">
		</li>

		<li>
			<input type="submit" value="Login" name="loginForm">	
		</li>
	</ul>
	
	<!-- login info yanlış ise hata versin diye -->
	<?php if ( isset($status) ) : ?>
	<p><?= $status; ?></p>
	<?php endif; ?>

</form>

</body>
</html>