<!-- CONTROLLER FILE -->
<!-- linklerin bağladığı sayfalarda kullanılıyor -->
<?php
// post sayfası için, tek post var
require 'blog.php';
use Blog\DB;

// Fetch all the posts 
// (id'ye göre arama yaptığı için outer array içinde tek bir subarray getirir)
// bc it is a blog we often want to grab posts according to a specific id
$post = DB\get_by_id( (int)$_GET['id'], $conn );
	// echo $_GET['id'];
	// print_r($post);
// // alt: less readable and less usable
// $post = DB\query('SELECT * FROM posts WHERE id = :id LIMIT 1',
// 				array('id' => $_GET['id']),
// 				$conn);

if ( $post ) {
	$post = $post[0]; // md array içinde ilk eleman seçilir
	
	/*md array olur*/
	view('single', array(
		'post' => $post // single.view.php için key post ismi önemli
	));
	// alt: used with frameworks, in case we had more data:
	// $data = array();
	// $data['post'] = 'some post';
	// view('single', $data);

	// // alt: önceki tutlardaki versiyon
	// $view_path = 'views/single.view.php';
	// include 'views/layout.php';
} else {
	header('location:/my-site/TutsPlus_PHP-Fundamentals/blog-part-3/blog/index.php');
	// redirects to index page in case id in query string doesnt correspond to a value or wrong in query string
}