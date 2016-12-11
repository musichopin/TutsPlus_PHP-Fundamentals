<?php

/*falsey values (not truthy): empty string, null, false or 0*/

// $day = 'Sunday';

// if($day == true) {
// 	echo 'It is truthy value!';
// } if($day == false) {
// 	echo 'It is falsey value!';
// } elseif($day === true) {  // $day = true için
// 	echo 'It is of boolean data type and has value of true!';
// }

/* === (veya !== ile) hem data type ı hem de value yu check ederken == (veya != ile) value yu check ederiz. strict equality (===) genelde variable'da ve condition'da true veya false kullanmak için önemlidir (?) */


$month = 'June';


/*
 * If Statements: 1
 */

// if($month == 'January') {
// 	echo 'It is Jan!';
// } elseif($month == 'February') {
// 	echo 'It is Feb!';
// } elseif($month == 'March') {

// } else {
// 	echo 'Not the right month!';
// }


/*
 * Switch Statements: 2
 */

// switch($month) {
// 	case 'January':
// 		echo 'It is Jan!';
// 		break;

// 	case 'February':
// 		echo 'It is Feb!';
// 		break;

// 	case 'March':
// 		echo 'It is March!';
// 		break;		

// 	default:
// 		echo 'Not the right month!';
// }




/*
 * Lookups: 3
 */

// $months = array(
// 	'January'   => 'It is Jan',
// 	'February'  => 'It is February',
// 	'March' 	=> 'It is March'
// );

// echo isset($months[$month]) ? $months[$month] : 'Not the right month!';




/*
 * and an or (or && and ||)
 */

if ( $month == 'May' or $month == 'June' ) {
	echo 'Is May or June';
} elseif ( $month != 'May' and $month != 'June' ) {
	echo 'Is other than May or June';
} else {
	echo 'It is not one of those.';
}




