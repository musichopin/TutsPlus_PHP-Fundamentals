<?php
// *CONTROLLER FILE*
require 'blog.php';
use Blog\DB;

// Fetch all the posts
$post = DB\get_by_id( (int)$_GET['id'], $conn );

if ( $post ) {
	$post = $post[0];
	
	/*md array olur*/
	view('single', array(
		'post' => $post
	));
} else {
	header('location:/my-site/TutsPlus_PHP-Fundamentals/blog-4/blog/index.php');
}
