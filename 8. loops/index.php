<?php

$arr = array('Jeff', 'Collis', 'Tash', 'Amanda');
// $arr = array(
// 	'ceo' => 'Collis',
// 	'manager' => 'Tash',
// 	'instructor' => 'Jeff'
// );


foreach($arr as $title => $name) {
	echo "<li><strong>$title</strong> - $name</li>";
}



// array mantığını anlamam bakımından önemli: 

// $r=array();
// foreach($arr as $name) {
// 	$r[]= "$name<br>";
// }
// print_r($r);

// echo "<br><br>";
// foreach($r as $ra) {
// 	echo $ra;
// }



// for( $i = 0; $i < count($arr); $i++ ) {
// 	echo "<li>$arr[$i]</li>";
// }



// $i = 0;
// while($i < count($arr) ) {
// 	echo "<li>$arr[$i]</li>";
// 	$i++;
// }
/*while sta is excellent while fetching rows from the database*/
