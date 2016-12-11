<?php

/*normally these variables are dynamic coming from sth like query string or database*/
$name = "Joe";

$age=27;

$greeting = "My name is $name and I am $age";

// // unsecured data taken from query string
// $greeting = "My name is $name and I am {$_GET['age']}.";
// // secured data taken from query string
// $greeting = "My name is $name and I am " . htmlspecialchars($_GET['age']);

echo $greeting . "<br>";



// These methods are more readable:
// printf (we are taking existing variables and binding them to a string or digit)
// sprintf (assigns the string to a variable rather than printing to the screen)
// sscanf (opposite of printf and sprintf. it parses a string assigning each of them to a variable) 


/* *** PRINTF FUNCTION *** */
/*printf ile sprintf readability sağlar*/
/*printf both binds the variables and prints out to the screen*/
printf("This post was made on %s %s, %d", 'June', '7th', '2012');
echo "<br>";
printf("My name is %s and I am %d", $name, $age);
// s: string, d: digit
echo "<br>";



/* *** SPRINTF FUNCTION *** */
/*sprintf no longer prints to the screen*/
$posted = sprintf("This post was made on %s %s %d", 'June', '7th', 2012);
echo $posted;
echo "<br>";



/* *** SSCANF FUNCTION *** */
/*inverse of printf and sprintf: it returns an array*/
$results = sscanf("This post was made on June 7th, 2012", "%s");
print_r($results);
echo "<br>";

/* %[^,] // anything but (^) comma */
$result = sscanf("June 7th, 2012", "%s %[^,], %d");
print_r($result);
echo "<br>";
// echo $result[2];

// list, takes the keys in array ([0],[1],[2]) and assigns them to variables ([June],[7th],[2012]) respectively (sscanf returns an array)
// In order to print specific elements of an array.
// Method 1:
list($month, $day, $year) = sscanf("June 7th, 2012", "%s %[^,], %d");
// Method 2:
sscanf("June 7th, 2012", "%s %[^,], %d", $month, $day, $year);

echo $year;
// // aşağıdaki ile aynı:
// echo sscanf("June 7th, 2012", "%s %[^,], %d")[2];


// list method:
echo "<br>";
list($name, $age) = array('Jeffrey', 27, 'Third Item');
echo $age;


/*there are also other kinds of print related  methods such as str_len*/