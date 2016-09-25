<?php namespace Blog\DB;

$config = array(
	'username' => 'root',
	'password' => '',
	'database' => 'blog'
);

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

// admin/index.php ve single.php için
function query($query, $bindings, $conn)
{
	$stmt = $conn->prepare($query);
	$stmt->execute($bindings);

	// hem database update hem de value fetch için kullanıldığından aşağıdaki sta get_by_id'ye taşındı
	// $results = $stmt->fetchAll();

	return ($stmt->rowCount() > 0) ? $stmt : false;
}

// index.php için
function get($tableName, $conn, $limit = 10)
{
	try {
		// we get most recent post at the top with "order by id desc"
		$result = $conn->query("SELECT * FROM $tableName ORDER BY id DESC LIMIT $limit");

		return ( $result->rowCount() > 0 )
			? $result
			: false;
	} catch(Exception $e) {
		return false;
	}
}

// single.php için
function get_by_id($id, $conn)
{
	$query = query(
		'SELECT * FROM posts WHERE id = :id LIMIT 1',
		array('id' => $id),
		$conn
	);

	return $query->fetchAll();
	// printer_draw_elipse(printer_handle, ul_x, ul_y, lr_x, lr_y)
}
