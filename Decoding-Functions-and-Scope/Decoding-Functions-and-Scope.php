<?php 

/*ex 1*/

// function say_hello($name = 'buddy') {
// 	return "Hi, there $name.";
// }

// echo say_hello('Joe');




/*ex 2: simple helper function pp*/

// function pp($arr) {
// 	echo '<pre>';
// 	print_r($arr);
// 	echo '</pre>';
// }

// $arr = array('name' => 'Joe', 'age' => 40, 'occupation' => 'teacher');

// // echo '<pre>';
// // print_r($arr);
// // echo '</pre>';

// pp($arr);




/*ex 3: implementing own custom array_plucked function*/

// function array_pluck($toPluck, $arr) {
// 	$ret = array();

// 	foreach($arr as $item){
// 		$ret[] = $item[$toPluck];
// 	}

// 	return $ret;

// }

// $people = array(
// 	array('name' => 'Jeffrey', 'age' => 27, 'occupation' => 'Web Developer'),
// 	array('name' => 'Joe', 'age' => 50, 'occupation' => 'Teacher'),
// 	array('name' => 'Jane', 'age' => 30, 'occupation' => 'Marketing')
// );

// $plucked = array_pluck('name', $people); // array('Jeffrey','Joe','Jane')

// print_r($plucked);

/*ex 3b: arrap_map method: first parameter is the function to execute and 2nd param is the array we are working with. it executes the function for every item withing the array*/

/*unlike c languages in php every function has its own local scope. inner anonymous function has its own local scope. that is why use kw was used*/
function array_pluck($toPluck, $arr) {
	$ret = array_map(function($item) use($toPluck) { 
		return $item[$toPluck];
	}, $arr);

	return $ret;
}

$people = array(
	array('name' => 'Jeffrey', 'age' => 27, 'occupation' => 'Web Developer'),
	array('name' => 'Joe', 'age' => 50, 'occupation' => 'Teacher'),
	array('name' => 'Jane', 'age' => 30, 'occupation' => 'Marketing')
);

$names = array_pluck('name', $people); // array('Jeffrey','Joe','Jane')

// print_r($names);
foreach ($names as $name) {
	echo $name . "<br>";
}