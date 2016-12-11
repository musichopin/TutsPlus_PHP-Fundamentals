<!doctype html>
<html>
<head>
	<title></title>
</head>
<body>

<?php
/*otomatik print yapmasına dikkat*/
if ( $results ) {
	/*2 print_r arasındaki farkı anlamak önemli*/
	// print_r($results);
	foreach($results as $row) {
		// print_r($row);
		echo $row->user_name . "<br>";
		/*"->" metod ve variable çağırmak için kullanılır*/
		/*practice db'deki users table'daki user_name columnuna (row una) karşılık gelen valuelar print edildi*/
	}
} else {
	echo 'No rows returned.';
	/*database, table veya row hatalı olmuş olabilir*/
}
?>

</body>
</html>