<!doctype html>
<html>
<head>
		<title></title>
</head>
<body>
	
	<!-- NEEDS TO BE LOCKED DOWN -->
	<h1>Folks On Your Mailing List</h1>
	<?php 
		// temp files are dumb but that much logic for temp files is acceptable

		if ($registered_users) {
			// print_r($registered_users);
			foreach ($registered_users as $user) {
				// print_r($user);
				/* list, takes the keys in array ([0],[1]) and assigns them to variables ([$name],[$email]) respectively */
				list($name, $email) = $user; /*array('name'=>'Joe', 'email'=>'Joe@hotmail.com')*/
				// echo "list($name, $email)";
				echo "<li>$name: <a href='mailto:$email'>$email</a></li>";
				// aynı şeyleri print ederler:
				// print_r($user[0]);
				// print_r($name);
			}
		} else {
			echo "<li>No registered members.</li>";
		}
	 ?>
</body>
</html>