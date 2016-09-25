<?php

// takes care of including our views for us
function view($path, $data = null) 
{
	if ( $data ) {
		extract($data);
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
	}
	include "views/{$path}.view.php";
}
// $path has been surrounded by curly braces for readability
