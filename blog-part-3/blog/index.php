<?php
/*CONTROLLER FILE (anasayfa için, 1'den fazla post var)*/
require 'blog.php'; /*blog.php üzerinden db.php ile bağlantı sağlamış*/
use Blog\DB;

// Fetch all the posts
$posts = DB\get('posts', $conn);

// var_dump($posts);

// print_r($posts);

// foreach ($posts as $post) {
// 	print_r($post);
// 	echo "<li>{$post['body']}</li>";
// }

/*md array olur*/
view('index', array(
	'posts' => $posts, // index.view.php için key posts ismi önemli ($posts, yukarıda fetch edilendir)
	'name' => 'John Doe'
));
// alt: used with frameworks, in case we had more data:
	// $data = array();
	// $data['post'] = 'some post';
	// $data['name'] = 'John Doe';
	// view('single', $data);

// alt: 
// $view_path = 'views/index.view.php';
// include 'views/layout.php';

// index.php -> blog.php -> functions.php (+ db.php) -> index.view.php
