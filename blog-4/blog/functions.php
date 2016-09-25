<?php

function view($path, $data = null) 
{
	if ( $data ) {
		extract($data);
	}
	// extract method turns keys of an array into variable names:
	// array(
	// 'posts' => $posts, 
	// 'name' => 'John Doe'
	// )
	// // extract edilince
	// $posts = $posts; 
	// // ($posts u for each loop ile ayırıp, içinden seçmek gerekir)
	// $name = 'John Doe'; 
	// // olur

	$path .= '.view.php';
	/*we could throw exception and/or return sth to ensure user specifies a path*/

	include "views/layout.php";
	// eskisi (layout gözükmüyordu):
	// include "views/{$path}.view.php";
}