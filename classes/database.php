<?php namespace App;
// we still use namespaces with classes

# PSUEDO CODE!!

// In addition to the idea of oop we can also use a class for the simple purpose of grouping together related functions as in connecting to a database

class Database {
	protected $conn;
	protected $table;

	public function __construct()
	{
		// connect to the database
		$this->conn = 'connected';
	}

	// update table
	public function set_table($table)
	{
		$this->table = $table;
	}

	public function insert()
	{
		//echo $this->conn;
		return 'inserted rows';
	}

	// fetches all rows from table with limit
	public function get($limit = 10)
	{
		return 'got the rows from the ' . $this->table . ' table.';
	}

	// fetch by id (query string)
	public function where($key, $value)
	{
		return "Return where $key equals $value.";
	}
}

$db = new Database();
$db->set_table('users');
$rows = $db->get(5);
echo $rows;
echo "<br>";
echo($db->where('id', 5));


// for creating thumbnails:
// after creating the thumbnail class,
// $thumb = new Thumbnail('image.jpg', 50, 50);
// or
// $thumb = new Thumbnail('image.jpg');
// thumb->generate(100, 100) ;