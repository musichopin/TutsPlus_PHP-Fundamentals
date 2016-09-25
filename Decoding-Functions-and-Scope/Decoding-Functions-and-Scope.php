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




/*ex 3.a: implementing our own custom array_plucked function*/

// function array_pluck($toPluck, $arr) {
// 	$ret = array(); // alt: $ret = []

// 	// print_r($arr); // md array
// 	foreach($arr as $item){
// 		// print_r($item); // sd array
// 		// print_r($item[$toPluck]); // non-array (echo da olur)
// 		$ret[] = $item[$toPluck];
// 	}
// 	// print_r($ret); // sd array
// 	return $ret;

// }

// $people = array(
// 	array('name' => 'Jeffrey', 'age' => 27, 'occupation' => 'Web Developer'),
// 	array('name' => 'Joe', 'age' => 50, 'occupation' => 'Teacher'),
// 	array('name' => 'Jane', 'age' => 30, 'occupation' => 'Marketing')
// );

// // we want array_pluck function to return an array that contains name values:
// $plucked = array_pluck('name', $people); // array('Jeffrey','Joe','Jane')

// print_r($plucked);



/*ex 3b: implementing our own custom array_pluck function via calling arrap_map method: first parameter is the function to execute and 2nd param is the array we are working with. when we call array_pluck function it calls the array_map and array_map executes the inner anonymous function for every item within the array*/

/*unlike c languages in php every function has its own local scope. inner anonymous function has its own local scope. that is why use kw was used*/

function array_pluck($toPluck, $arr) {
	// print_r($arr); // prints md array
	$array_map = array_map(function($item) use($toPluck) { /*$ret = array_map(anonymous($arr, $toPluck))*/
		// print_r($item); // for each loop a girmiş gibi sub arrayler print edilir
		// print_r( $item[$toPluck]); // echo da olur (prints non-array)
		return $item[$toPluck]; /*whatever value we return will be assigned to $ret/$array_map
		// (looptan çıkmamak için assignment sonrası toptan return ediliyor diye düşünülmeli)*/
		// return $item['name'] = 'changed';
	}, $arr);
	// print_r($array_map); // array_map sonrası for each loop'un aksi yönde hareket edip arraylenir diye düşünülebilir
	// print_r($array_map); // prints sd array
	return ($array_map);
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



// ***3.a***
// print_r($arr);
// Array ( [0] => Array ( [name] => Jeffrey [age] => 27 [occupation] => Web Developer ) [1] => Array ( [name] => Joe [age] => 50 [occupation] => Teacher ) [2] => Array ( [name] => Jane [age] => 30 [occupation] => Marketing ) ) 

// print_r($item);
// Array ( [name] => Jeffrey [age] => 27 [occupation] => Web Developer ) Array ( [name] => Joe [age] => 50 [occupation] => Teacher ) Array ( [name] => Jane [age] => 30 [occupation] => Marketing )

// print_r( $item[$toPluck]); // echo da olur
// JeffreyJoeJane

// print_r($ret);
// Array ( [0] => Jeffrey [1] => Joe [2] => Jane ) 

// echo;
// Array ( [0] => Jeffrey [1] => Joe [2] => Jane ) 




// ***3.b***
// print_r($arr);
// Array ( [0] => Array ( [name] => Jeffrey [age] => 27 [occupation] => Web Developer ) [1] => Array ( [name] => Joe [age] => 50 [occupation] => Teacher ) [2] => Array ( [name] => Jane [age] => 30 [occupation] => Marketing ) ) 

// print_r($item);
// Array ( [name] => Jeffrey [age] => 27 [occupation] => Web Developer ) Array ( [name] => Joe [age] => 50 [occupation] => Teacher ) Array ( [name] => Jane [age] => 30 [occupation] => Marketing ) 

// print_r( $item[$toPluck]); // echo da olur
// JeffreyJoeJane

// print_r($array_map); // for-each loopun aksi istikamet (arrayleniyor)
// Array ( [0] => Jeffrey [1] => Joe [2] => Jane ) 

// print_r($names);
// Array ( [0] => Jeffrey [1] => Joe [2] => Jane )

// echo;
// Jeffrey
// Joe
// Jane