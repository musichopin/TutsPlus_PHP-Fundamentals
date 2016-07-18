<?php namespace Blog\DB;

require 'functions.php';	

$conn = connect($config);

if ( $conn ) {
	$id = isset($_GET['id']) ? (int)$_GET['id'] : 2;
	/*id set edilmiş mi diye kontrol edilir
	we could redirect the user to a different page instead of id 2*/

	/*with $_GET['id'] php uses query string (in the url)
	to take the id from the db*/
	$row = query("SELECT * FROM users WHERE id = :id",
				  array('id' => $id), /*'id' => 2 derdik query stringe bağlı olmasa*/
				  $conn)[0];
	/*md array ve [0] ile x eksenine göre en soldaki seçiliyor
	alt olarak, <h1><?= $row[0]['user_name'];?>'s Profile</h1> denebilirdi*/
}
?>
<html>
<head>
	<title></title>
</head>
<body>
	<!-- if there is row/if it is true (functions dosyası ile olan etkileşim önemli) -->
	<!-- if sta syntax değiştirildi ki html tagleri php tagleri arasına girmeden kullanılabilsin -->
	<?php if ( $row ) : /*print_r($row);*/ ?>
	<h1><?= $row['user_name'];?>'s Profile</h1>
	
	<?php else: ?>
	<!-- if there are no rows/if it is false (id'ye karşılık gelen value yoksa) 
	echo "no user" -->
		<h1>No User</h1>
	<?php endif; ?>

</body>
</html>