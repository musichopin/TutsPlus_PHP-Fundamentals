<?php

// other examples are person, photo, user class etc instead of house class
class House {
	public $color = 'white';
	public $rooms = 3;
	public $for_sale = true;

	public function __construct($color = null)
	{
		// $color; null, 0, "" veya false ise if sta atlanır
		if ( $color ) {
			$this->color = $color;
			// this refers to new instance
			// we don't have dollar sign after this kw
		}
	}

// within class functions are referred to as methods
	public function add_room()
	{
		$this->rooms++;
	}

	public function sell()
	{
		$this->for_sale = false;
	}
}

$house = new House('red');
$house->add_room();
$house->add_room();

echo "This {$house->color} house has {$house->rooms} rooms. ";

echo ($house->for_sale)
	? "It is for sale."
	: "It is not for sale.";


echo "<br>";

$house2 = new House();
$house2->add_room();
$house2->add_room();
$house2->add_room();
$house2->add_room();
$house2->add_room();
$house2->sell();

echo "This {$house2->color} house2 has {$house2->rooms} rooms. ";
echo ($house2->for_sale)
	? "It is for sale."
	: "It is not for sale.";

// two different instances above ($house1 and $house2) use the same blue-print (House class), but each one has their own specific trade