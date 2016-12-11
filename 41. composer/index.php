<!-- by working with composer not only did we save ourselves from having to create our own db class, but now we got much more elegant way to work with tables -->
<?php 

require_once "vendor\php-activerecord\php-activerecord\ActiveRecord.php";

// namespacing
ActiveRecord\Config::initialize(function($cfg){
	// models is kinda the representation of our data (or table)
	$cfg->set_model_directory('models');
	$cfg->set_connections(array(
		'development' => 'mysql://root:@localhost/blog'
		// we are connecting to localhost as db name we wanna connect to
		// we probably wanna put config files into a different file
	));
});

// from post table, fetch the row having id of 1
$post = POST::find(2);

print_r($post);

echo "<br>";
echo "<br>";

$post = POST::find_by_title('My Third Post');

print_r($post);

echo "<br>";
echo "<br>";

$post = POST::find_by_body('Is this a new post?');

print_r($post);

echo "<br>";
echo "<br>";



// *1. fetches all rows from post table*
$posts = POST::all();

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php foreach ($posts as $p) : ?>
	<article>
		<h2><?= $p->title; ?></h2>
		<div class="body"><?= $p->body ?></div>
	</article>
<?php endforeach; ?>

</body>
</html>



<?php 

// *2.create row (insert values into row)*
POST::create(array(
	'title' => 'Isn\'t Active Record great?', 
	'body' => 'Yes it is'
));



// *3.update row (update values)*
$post = POST::find(29);
$post -> title = 'Updated';
$post -> save();

