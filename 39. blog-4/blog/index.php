<?php
// *CONTROLLER FILE*
require 'blog.php';
use Blog\DB;

// Fetch all the posts
$posts = DB\get('posts', $conn);

/*md array olur*/
view('index', array(
	'posts' => $posts,
	'name' => 'John Doe'
));
// index.view.php için key posts ismi önemli
// index.php -> blog.php -> functions.php (+ db.php) -> layout.php -> index.view.php