<!-- bağımsız proje -->
<?php

/*on the first request we set the cookie. when we reload the page it is sent back to the server and we get back the value*/
/*to delete a cookie time must be set to negative*/
/*key, value, expiration date, path, domain*/

setcookie('fontSize', 25, time() + 60 * 30, '/');
echo $_COOKIE['fontSize'];


// alt: array syntax allows us to interact with them as an array (with arrays we have only 1 variable name):

// setcookie('prefs[fontSize]', 25);
// setcookie('prefs[favoriteCategory]', 'news');
// setcookie('prefs[screenWidth]', '1024');
?>
<html>
<head>
	<title></title>
	<style>
	body {
		font-size: <?= htmlspecialchars($_COOKIE['fontSize']); ?>
	}
	</style>
</head>
<body>

	<!-- <?php
	/*cookie nin silinmesine veya belirtilmemesine karşılık condition gerçekleştiriliyor*/
	/*hem $_COOKIE hem de prefs array*/
	if ( isset($_COOKIE['prefs']) ) {
		foreach($_COOKIE['prefs'] as $key => $val ) {
			echo '<li>' . htmlspecialchars($key) . ': ' . htmlspecialchars($val);
		}
	}
	?> -->

	<p>Hi, how are you?</p>

</body>
</html>