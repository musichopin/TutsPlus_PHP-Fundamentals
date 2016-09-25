<?php namespace Blog\DB;

$config = array(
	'username' => 'root',
	'password' => ''
);
/*we could have created classes for helper functions in order to connect them in a better way. If we didn't create classes or used namespaces then renaming our functions as myapp_db_query and myapp_db_get would be another less preferred option*/

/*this function connects us to db*/
function connect($config)
{
	try {/*new \PDO(...) means start at the root, do not assume Blog\DB\PDO*/
		$conn = new \PDO('mysql:host=localhost;dbname=practice',
						$config['username'],
						$config['password']);

		/*sets the error mode*/
		$conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

		return $conn;
	} catch(Exception $e) {
		return false;
		/*exception is caught and false is returned if we cannot connect to the db by entering the wrong db name or false credentials*/
	}
}

/*prepared sta: bindings is used as it is prepared sta*/
function query($query, $bindings, $conn)
{
	$stmt = $conn->prepare($query);
	/*prepares the query*/

	/*finds the parameters and executes it*/
	$stmt->execute($bindings);

	// print_r($stmt);

	$results = $stmt->fetchAll();
	/*fetches all the rows*/

	return $results ? $results : false;
	/*if there are no results we return false*/
	// alt: index2'de (query(...)[0]) denmemeli:
	// while($results = $stmt->fetch()) {
	// return($results);
	// }
}


/*query method: gets all the rows from the users table. */
/* *** query method, id, hardcoded olarak girilseydi de kullanılabilirdi 
(tüm id leri seçmesinin yanı sıra) *** */
function get($tableName, $conn)
{
	/*try catch block used for testing the validity of the table*/
	try {
		$result = $conn->query("SELECT * FROM $tableName");
		/* the query method is fine since we would hard-code the value */

		// print_r($result);
		
		/*table'ın boş olması durumunda false return edilir*/
		return ( $result->rowCount() > 0 )
			? $result
			: false;
	} catch(Exception $e) {
		return false;
		/*exception is caught and false is returned if we enter a wrong table name*/
	}

}
