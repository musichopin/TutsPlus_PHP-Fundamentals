<?php

// $person = array(
// 	'first' => 'John',
// 	'last' => 'Doe'
// );

// var_dump($person);


/* ***Object*** */
class Person
{
	public $name;
	public $job;

	function __construct($name, $job)
	{
		$this -> name = $name;
		$this -> job = $job;
	}

		public function communicate($style = 'voice')
	{
		return 'communicating with ' . $style;
	}
}

$p = new Person('John','Teacher');
var_dump($p);
echo $p-> name . ' is a ' . $p-> job . "<br>";
echo $p -> communicate('telepathy');
/*to access properties of objects we use arrow, -> (for array it was square brackets, [])*/



/* ***Generic/std Class: empty generic class that we can fill up. assignment and creation same time*** */
$person = new stdClass;
$person->first = "John";
$person->last = "Doe";
$person->job = "Teacher";
// $person->communicate = function(){
// 	return 'communicating';
// }
// // doesn't work for methods, different approach needed such as magic method:
// class name {
// 	public function __call()
// 	{

// 	}
// }
$person->first;
var_dump($person);

echo $person->first . ' ' . $person->last;
// we interact with this info as an object rather than using an array
// we can straightforwardly add methods


$person = array(
	'first' => 'John',
	'last' => 'Doe'
);

var_dump($person);

echo $person['first'] . "<br>";

// echo gettype((int)'5');
/*casting array to an object*/
$o = (object) $person;

echo $o->first . "<br>";