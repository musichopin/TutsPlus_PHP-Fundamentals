<?php
	/* ***başlangıç noktası hepsi (*), ondan sonra database'den table a ait (users) tüm rowların for each loop da istenen kısımlarını (user_name) print eder *** */
require 'functions.php';
use Blog\DB;
/*Blog root folder and then DB subfolder*/

$conn = DB\connect($config);
/*try catch block ile if sta arasındaki ilişkiyi anlamak önemli*/
if ( $conn ) {
	$users = DB\get('users', $conn);
} else die('Could not connect'); 
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

		if ( $users ) { /*print_r($users)*/;
			foreach($users as $user) {	/*print_r($user)*/;
				// foreach ile subarrayler elde edilir
				echo "<li>{$user['user_name']}</li>";
			}
		} else {
			echo "No rows returned.";
		}
	?>
</body>
</html>