<?php 
require 'functions.php';

/*if form has been posted...*/
if ($_SERVER['REQUEST_METHOD']=='POST') {
	$name = trim($_POST['name']); /*trims extra space (value attr'un value'sunu)*/
	$email = trim($_POST['email']);
	// echo $name; die();

	if (empty($name) || empty($email) || !valid_email($email)) {
		$status = "Please provide a name and valid email adress.";
	} else {
		add_registered_user($name, $email);
		$status = "Thank you for registering. Your info has been added to the mailing list";
	}
}

require 'index.tmpl.php';
/*we can require at the end since we don't call this tmpl file's function, 
index.php kind of becomes like a middleman for tmpl.php to reach old function at functions.php
*/