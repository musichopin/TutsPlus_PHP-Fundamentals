<?php
// *CONTROLLER FILE*
// we are trying to set up a form to create new posts
require '../blog.php';
$data = array();

// if we have more than 1 form this may not be enough
// if form has been submitted 
if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
	$title = $_POST['title'];
	$body = $_POST['body'];

	// *we will try to move the upper part to a model file (MVC: movel-view-controller)*
	if ( empty($title) || empty($body) ) {
		$data['status'] = 'Please fill out both inputs.';
		// alt2:
		// $status = 'Please fill out both inputs.';
	} else {
		// then create a new row in the table
		Blog\DB\query(
			/*posts is table, title and body are fields*/
			/*:title (and title in array) is placeholder, $title comes from value of posted form element*/
			"INSERT INTO posts(title, body) VALUES(:title, :body)",
			array('title' => $title, 'body' => $body),
			$conn);

		$data['status'] = 'Row has successfully been inserted.';
		// alt2:
		// $status = 'Row has successfully been inserted.';

	}
}

// layout file a göre admin/create file ismi verilmiş
view('admin/create', $data);
// since we don't include view.php anything we want our view to have we have to pass through to the view function
// create.view.php'yi layout'un içerisine oturtur

// alt2: key status view.php'deki $status ile aynıdır (extract fonksiyonu sonrası), value $status ise yukarıdaki ile aynıdır
// view('admin/create', array('status' => $status));


// admin/index.php -> blog.php -> functions.php (+ db.php) -> views/layout.php -> views/admin/create.view.php