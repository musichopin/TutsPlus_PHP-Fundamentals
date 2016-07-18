<?php

$post = array(
	'author' 	   => 'Jeffrey Way',
	'title'		   => 'My Awesome Post',
	'body'   	   => 'Here is the body',
	'publish_date' => '6-10-2012',
	'category'     => 'Personal'
);

// 1st alt: still better than writing a long string

// $email = "<h1>{$post['title']}</h1>";
// $email .= "<p>By: {$post['author']}</p>";
// $email .= "<div>{$post['body']}";

/*arrayi double quotation mark içerisine alacaksak curly bracket tarafından sarılmalıdır*/



// 2nd alt: better

//$email = sprintf("<h1>%s</h1><p>%s</p><div>%s</div>", $post['title'], $post['author'], $post['body']);



// 3rd alt: best

extract($post); /*turns keys into variable names*/

/*EOT variable name might change.
Heredocs (EOT;) should not be the last statement on file
we should be careful about spaces before and after EOT variable
change of EOT variable's location might cause mistake*/

$email = <<<EOT
<h1>$title</h1> /*instead of {$post['title']} thanks to extract function above*/
<p>By: $author within the $category category.</p>

<div>$body</div>
EOT;

echo $email;
