<!doctype html>
<html>
<head>
		<title></title>
</head>
<body>
	
	<!-- NEEDS TO BE LOCKED DOWN -->
	<h1>Folks On Your Mailing List</h1>
	<?php 
		if ($registered_users) {
			foreach ($registered_users as $user) {
				list($name, $email) = $user; /*array('name'=>'Joe', 'email'=>'Joe@hotmail.com')*/
				echo "<li>$name: <a href='mailto:$email'>$email</a></li>";
			}
		}
	 ?>
</body>
</html>