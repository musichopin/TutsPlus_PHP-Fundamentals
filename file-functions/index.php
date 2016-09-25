<?php
	
	$files = glob('r*.txt');
	print_r($files);
	echo '<br>';

	$files = glob('img/*.jpg');
	print_r($files);
	echo '<br>';

	/*all files within the img folder having these extensions:*/
	/*no space within curly braces*/
	$files = glob('img/*.{png,jpg,jpeg}', GLOB_BRACE);
	print_r($files);
	echo '<br>';

	/*
	fullname = img/flat-file-blog-engine.png ise

	filename: filename: flat-file-blog-engine 
	substr: extension: png
	basename: basename: flat-file-blog-engine.png 
	dirname: directory: img 
	pathinfo: universal
	extract: universal
	*/
	

	$images = glob('img/*.{png,jpg,jpeg}', GLOB_BRACE);
	foreach($images as $img) {
		// echo $img;
		// echo "\r"; // görünürde değişim yaratmadı
		// echo "<br>";

		// OR: base name
		// echo basename($img);
		// echo "\r";

		// OR: directory
		// echo dirname($img);
		// echo "\r";

		// OR: extension
		// echo substr($img, -3);
		// echo "\r";

		// OR: extension (better)
		// pathinfo($img) returns an array: 
		// print_r(pathinfo($img));
		// $info = pathinfo($img);
		// echo $info['extension'];
		// echo "\r";

		// OR: extension (better)
		// we are passing the associative array to the extract function
		// extract(pathinfo($img));
		// echo $extension;
		// echo "\r";
		// filename vs'de print edilebilirdi:
		// echo $filename;
		// echo "\r";

		// OR: extension (best)
		// with PATHINFO_EXTENSION we specify pathinfo doesn't return an array but returns a specific value corresponding to a specific key
		// echo pathinfo($img, PATHINFO_EXTENSION);
		// echo "\r";
		// filename vs'de print edilebilirdi:
		// echo pathinfo($img, PATHINFO_FILENAME);
		// echo "\r";


		// Somebody uploaded an image and we wanna dynamically create thumbnails
		// $info = pathinfo($img);
		// $thumb_name = $info['filename'] . '-thumb.' . $info['extension'];
		
		// OR
		$filename = pathinfo($img, PATHINFO_FILENAME);
		$extension = pathinfo($img, PATHINFO_EXTENSION);
		$thumb_name = "thumb-{$filename}.{$extension}";
		/*curly braces added for readability*/
		
		// OR
		// extract(pathinfo($img));		
		// $thumb_name = "thumb-{$filename}.{$extension}";
		
		echo $thumb_name . "\n";
	}
	
?>