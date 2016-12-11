<!doctype html>
<html>
<head>
	<title></title> 
	<style>
		ul, li {margin: 0; padding: 0;}
		li {list-style: none;}
		.notice {color: red; font-style: italic;}
	</style>
</head>
<body>
	<!-- temp files are dumb but that much logic for temp files is acceptable -->
	<h1>Join the Mailing List</h1>
	<form action="" method="post">
		<?php if (isset($status)) : ?> 
		<p class="notice"><?= $status; ?></p> <!-- it matters where we echo -->
		<?php endif; ?>
		<ul>
			<li>
				<label for="name">Your Name: </label>
				<input type="text" name="name" value="<?= old('name'); ?>">
				<!-- less preferred alt: value="<?= isset($_POST['name']) ? $_POST['name'] : ""; ?>" -->
				<!-- name attr'un valuesu ile value attr'un valuesu senkronize ediliyor -->
			</li>
			<li>
				<label for="email">Your Email Adress: </label>
				<input type="text" name="email" value="<?= old('email'); ?>">
			</li>
			<li>
				<input type="submit" value="Sign Up!">
			</li>
		</ul>
	</form>
</body>
</html>