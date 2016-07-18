<?php

require 'functions.php';
use Blog\DB;
/*Blog root folder and then DB subfolder*/

$conn = DB\connect($config);
/*try catch block ile if sta arasındaki ilişkiyi anlamak önemli*/
if ( $conn ) {
	$users = DB\get('users', $conn);
} else die('Could not connect'); /*we die so that code execution stops*/
?>
<!-- on the top we are connecting to the db and get all the rows from the users table (normally would be placed on controller file)
on body we print the datas (should be placed on view file) -->
<!doctype html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php

		if ( $users ) {
			foreach($users as $user) {	/*print_r($user);*/
				echo "<li>{$user['user_name']}</li>";
			}
		} else {
			echo "No rows returned.";
		}
	?>
</body>
</html>