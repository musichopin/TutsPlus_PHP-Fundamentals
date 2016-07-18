<?php 

/*creates constant for ease of use*/
define('MAILING_LIST', 'mailing_list.php');

/*good function names provide readability as well as providing reusability*/
/* ADD TO FILE (normalde database'e eklenmesi gerekirdi) */
function add_registered_user($name, $email) {
	# REALLY IMPORTANT: SECURE FILE, options are, 
	// placing outside of the doc root (best option): ../mailing_list.php... 
	// creating constants
	// restricting access
	file_put_contents(MAILING_LIST, "$name: $email\n", FILE_APPEND);
	/*3rd parameter is optional, used to designate the behaviour of the php file*/
	/*mailing_list.php does the job of database in this example*/
}
/*
“http://localhost:81/my-site/TutsPlus_PHP-Fundamentals/Hands-On-Email-Registration/index.php” yerine “http://localhost:81/my-site/TutsPlus_PHP-Fundamentals/Hands-On-Email-Registration/” demek bile index sayfasına yönlendirir
*/

/*$_REQUEST, $_POST ile $_GET yerine kullanıldı (ki garanti olsun metod türü)*/
/*index.php tmpl.php ile function.php'yi birleştirdiğinden functions.php'nin include edilmesi anlamsız*/
/* REMEMBER INPUT */
function old($key) {
	if (!empty($_REQUEST[$key])) {
		return htmlspecialchars($_REQUEST[$key]); /*chars used against break*/
	}

	return '';
}

function valid_email($email) {
	/*returns true or false*/
	return filter_var($email, FILTER_VALIDATE_EMAIL);
	// alt: regex
	// return pregmatch (‘/regular expression/’, $email);
}

function get_registered_users($path = MAILING_LIST) {
	/*file function grabs each item within the file. read mailing_list.php and return an array where each line within this file is its own item within the array*/
	$users = file($path); 
	// print_r($users); die(); 

	// print_r(explode(': ', $users[0])); die();

	/*map over items within the file and separate each line within the mailing list into an array that contains their name as well as their mailing adress. that is what we are returning from the get_registered_users function. if nothing is returned return false*/
	if (count($users)) {
		/*we map over each item within the array and we reference each item with the variable name users*/
		return array_map(function($user) {
			// print_r($user);
			$bits = explode(': ', htmlspecialchars($user));
			/*for each item within bits array run it through the htmlspecialchars function*/
			// return(array_map('htmlspecialchars', $bits));
			// //rather than running each item through htmlspecialchars we do it right away above
			return $bits;
		}, $users);
	}
	return false;
}
	// print_r($users); die(); 
	// // Array ( [0] => Jeffrey: Jeffrey@way.com [1] => Way: Way@Jeffrey.com [2] => Jessie: Jessie@jess.com ) 

	// print_r(explode(': ', $users[0])); die();
	// // Array ( [0] => Jeffrey [1] => Jeffrey@way.com ) 

	// print_r($user);
	// // Jeffrey: Jeffrey@way.com Way: Way@Jeffrey.com Jessie: Jessie@jess.com 

	// $bits = explode(': ', $user);
	// print_r($bits);
	// // Array ( [0] => Jeffrey [1] => Jeffrey@way.com ) Array ( [0] => Way [1] => Way@Jeffrey.com ) Array ( [0] => Jessie [1] => Jessie@jess.com ) 