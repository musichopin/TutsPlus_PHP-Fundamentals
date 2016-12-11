<?php 

/*creates constant for ease of use*/
define('MAILING_LIST', $_SERVER['DOCUMENT_ROOT'] . 'my-site/TutsPlus_PHP-Fundamentals/Hands-On-Email-Registration/admin/mailing_list.php');
// absolute path kullanılmasa registered_users.php (get_reg_users) için 'mailing_list.php',
// index.php (add_reg_users) için 'admin/mailing_list.php' uzantısı gerekecekti
// echo $_SERVER['DOCUMENT_ROOT'] . 'my-site/TutsPlus_PHP-Fundamentals/Hands-On-Email-Registration/admin/mailing_list.php';

/*normalde aşağıdaki fonksiyonlarda orderın olması gerekirdi*/
/*good function names provide readability as well as providing reusability*/
/* ADD TO FILE (normalde database'e eklenmesi gerekirdi) */
/*
|-----------------------------------------------------------
| Add a new item to the registered users list
|-----------------------------------------------------------
*/
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
/*
|-----------------------------------------------------------
| Preserve form state
|-----------------------------------------------------------
*/
function old($key) {
	if (!empty($_REQUEST[$key])) { /*form submit edildiğinde $key boş değil ise*/
		return htmlspecialchars($_REQUEST[$key]); /*chars used against break*/
	}

	return '';
}

/*
|-----------------------------------------------------------
| Determines whether email adress is valid
|-----------------------------------------------------------
*/
function valid_email($email) {
	/*returns true or false*/
	return filter_var($email, FILTER_VALIDATE_EMAIL);
	// alt: regex
	// return pregmatch (‘/regular expression/’, $email);
}

/*
|-----------------------------------------------------------
| Returns an array of all registered users
|-----------------------------------------------------------
*/
function get_registered_users($path = MAILING_LIST) {
	/*file function grabs each item within the file. read mailing_list.php and return an array where each line within this file is its own item within the array (single dimensional array)*/
	$users = file($path); 
	// print_r($users); die(); // sd array

	// print_r(explode(': ', $users[0])); die(); // sd array

	/*map over items within the file and separate each line within the mailing list into an array that contains their name as well as their mailing adress. that is what we are returning from the get_registered_users function. if nothing is returned return false*/
	if (count($users)) {
		/*we map over each item within the $users array and reference each item with the variable name user*/
		$ret = array_map(function($user) { /*$registered_users'a return eder*/
			/*users for-each loop'dan çıkmışcasına user oldu. array_map ten çıkınca ise md array olur, explode function yüzünden (normalde single dimensional array olacaktı)*/

			// print_r($user); // non-array

			$bits = explode(': ', htmlspecialchars($user));
			// // for each item within bits array run it through the htmlspecialchars function
			// return(array_map('htmlspecialchars', $bits)); // array_map'e return eder
			// //rather than running each item through htmlspecialchars we do it right away above
			// print_r($bits); // sd arrayler 
			return $bits; /*array_map'e return eder*/
		}, $users);
		// print_r($ret); // md array
		return($ret);

		// // alt: 
		// // print_r($users); // sd array
		// $bits = array(); 
		// foreach($users as $user){
		// // print_r($user); // non-array 
		// $bits[] = explode(': ', htmlspecialchars($user));
		// }
		// // print_r($bits); // md array
		// return $bits;
	}
	return false;
}
	// print_r($users); die(); 
	// // Array ( [0] => Jeffrey: Jeffrey@way.com [1] => Way: Way@Jeffrey.com [2] => Jessie: Jessie@jess.com ) 

	// print_r(explode(': ', $users[0])); die();
	// // Array ( [0] => Jeffrey [1] => Jeffrey@way.com ) 

	// print_r($user);
	// // Jeffrey: Jeffrey@way.com Way: Way@Jeffrey.com Jessie: Jessie@jess.com 

	// $bits = explode(': ', htmlspecialchars($user)); 
	// print_r($bits);
	// // Array ( [0] => Jeffrey [1] => Jeffrey@way.com ) Array ( [0] => Way [1] => Way@Jeffrey.com ) Array ( [0] => Jessie [1] => Jessie@jess.com ) 
	
	// print_r($ret); // for each loop un aksi istikamet
	// // Array ( [0] => Array ( [0] => Jeffrey [1] => Jeffrey@way.com ) [1] => Array ( [0] => Way [1] => Way@Jeffrey.com ) [2] => Array ( [0] => Jessie [1] => Jessie@jess.com ) [3] => Array ( [0] => <h>asfda</h> [1] => asdfasdf@hotmail.com ) [4] => Array ( [0] => simon [1] => simonaccc@hotmail.com ) [5] => Array ( [0] => Buse [1] => Aksay@gmail.com ) ) 