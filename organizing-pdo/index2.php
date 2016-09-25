<?php namespace Blog\DB;

	/* ***başlangıç noktası query string (id), sonra database'den id'ye göre (query string) rowdaki karşılıklarını (user_name) getirir*** */
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
				  $conn)[0]; /*subarray i komple seçer*/
	/*md array ve [0] ile x eksenine göre en soldaki seçiliyor
	alt olarak aşağıda, <h1><?= $row[0]['user_name'];?>'s Profile</h1> denebilirdi*/
} else die('Could not connect');
?>
<html>
<head>
	<title></title>
</head>
<body>
	<!-- if there is row/if it is true (functions dosyası ile olan etkileşim önemli) -->
	<!-- if sta syntax değiştirildi ki html tagleri php tagleri arasına girmeden kullanılabilsin -->
	<?php if ( $row ) : /*print_r($row)*/; ?>
	<h1><?= $row['user_name'];?>'s Profile</h1> <!-- print_r denebilirdi -->
	
	<?php else: ?>
	<!-- if there are no rows/if it is false (id'ye karşılık gelen value yoksa) 
	echo "no user" -->
	<h1>No User</h1>
	<?php endif; ?>

</body>
</html>

<!-- print_r(query("SELECT * FROM users WHERE id = :id",
				  array('id' => $id), 
				  $conn)); -->
<!-- Array ( [0] => Array ( [id] => 2 [0] => 2 [user_name] => John [1] => John ) ) -->


<!-- print_r($row); -->
<!-- Array ( [id] => 2 [0] => 2 [user_name] => John [1] => John )  -->