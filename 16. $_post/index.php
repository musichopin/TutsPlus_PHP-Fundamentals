<?php

// to see what is in php:

// alt 1: (useful for multiple forms in this format: isset($_POST['loginForm']))
// if ( !empty($_POST) ) {
// 	print_r($_POST);
// }


// alt 2:
if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

	// Make sure your local server is setup properly for this.

	/*
	 * Home Work
	 *
	 * Use heredocs to prepare an HTML email message, and set the necessary headers.
	 * Refer here for more info: php.net/mail
	 */

	/*We will probably also likely to include user's email adress*/
	// we need some way to determine if the mail was sent (mail function returns either true or false)
	if ( mail(
		'jeffrey@envato.com', /*to*/
		'New Website Message', /*subject*/
		htmlspecialchars($_POST['message'])) /*message has been taken from the name of the text-area*/
		//, additional headers
	) {
		$status = "Thank you for your message.";
	}
}

// when nth is submitted method becomes GET
// echo $_SERVER['REQUEST_METHOD'];

?>
<!doctype html>
<html>
<head>
	<title></title>
	<style>
	form ul { margin: 0; padding: 0; }
	form li { list-style: none; margin-bottom: 1em; }
	</style>
</head>
<body>

	<h1>Contact Form</h1>
	<form action="" method="post">
		<ul>
			<li>
				<label for="name">Name: </label>
				<input type="text" name="name" id="name">
			</li>

			<li>
				<label for="email">Email: </label>
				<input type="text" name="email" id="email">
			</li>

			<li>
				<label for="message">Your Message: </label><br>
				<textarea name="message" id="message"></textarea>
			</li>

			<li>
				<input type="submit" value="Go!">
			</li>
		</ul>
	</form>

	<?php if(isset($status)) echo $status; ?>

</body>
</html>