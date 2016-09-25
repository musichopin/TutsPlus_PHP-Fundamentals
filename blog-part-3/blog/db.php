<?php namespace Blog\DB;
/*it is good convention to have namespaces to mimic the folder structure*/
// named db because functions are related to database

$config = array(
	'username' => 'root',
	'password' => '',
	'database' => 'blog'
);

/*in a real world situation below functions might be in a class*/
function connect($config)
{
	try {
		$conn = new \PDO('mysql:host=localhost;dbname=' . $config['database'],
						$config['username'],
						$config['password']);

		$conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

		return $conn;
	} catch(Exception $e) {
		return false;
	}
}


function query($query, $bindings, $conn)
{
	$stmt = $conn->prepare($query);
	$stmt->execute($bindings);

	$results = $stmt->fetchAll();

	return $results ? $results : false;
}

/*it is not a good idea to fetch all rows, since if blog got 1000 posts
we would have to select 1000 rows from the db. that is why limited to 10, but 
if limit comes from the user input we need to use prepared sta*/
function get($tableName, $conn, $limit = 10)
{
	try {
		$result = $conn->query("SELECT * FROM $tableName LIMIT $limit");

		return ( $result->rowCount() > 0 )
			? $result
			: false;
	} catch(Exception $e) {
		return false;
	}
}


/*for security limit 1 has been put*/
// calls the query function
function get_by_id($id, $conn)
{
	return query(
		'SELECT * FROM posts WHERE id = :id LIMIT 1',
		array('id' => $id),
		$conn
	);
}
