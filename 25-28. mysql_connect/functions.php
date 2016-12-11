<?php

/* ***USING THE OLD mysql API IS AN ANTI-PATTERN! ONLY FOR REFERENCE*** */
// old mysql api is less flexible and more open to sql injection than PDO 

/*connection ve db için: makes error checking for the connection and connects to the db*/
function connect($host = 'localhost', $username, $password, $db = null)
/*some parameters got default values*/
{
	$conn = mysqli_connect($host, $username, $password); /*provides connection*/
	/*mysql yerine mysqli dendi*/

	if ( !$conn ) die('Could not connect.');

	if ( $db ) { /*if user entered a value*/
	/*alt: if (!empty($db))*/

		mysqli_select_db($conn, $db); /*selects the db*/
		/*The connection comes first according to the docs*/
	}

	return $conn;
}

/*connection, db ve table için: queries the db and returns a set of rows based on table*/
function query($query, $conn)
{
	$results = mysqli_query($conn, $query);
	/*The connection comes first according to the docs*/

	if ( $results ) { /*if sth is returned*/
		$rows = array();
		while($row = mysqli_fetch_object($results)) {
			// // md array olduğundan print_r loop içerisinde kullanılabilir
			// print_r($row);
			// echo $row->user_name . "<br>";
			$rows[] = $row;
			/*we fill up the rows array with the rows returned from the query*/
		}
		return $rows;
	}

	return false;
}

