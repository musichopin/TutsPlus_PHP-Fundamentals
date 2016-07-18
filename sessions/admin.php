<?php
// we should have access to the username once the session starts

session_start();
/*session_start must come before every other session statements*/

// Viewer: Can this be abstracted away to a reusable function?
/*login.php de login olmadan admin.php ye gelmeye karşın yapılıyor*/
/*if username has not been set redirect to login.php*/
if ( !isset($_SESSION['username']) ) {
	header('Location: login.php');
	die(); /*we die so nth else is executed*/
}

?>
<!doctype html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Hello, <?php echo $_SESSION['username']; ?></h1>
	<a href="logout.php">Logout</a>
</body>
</html>