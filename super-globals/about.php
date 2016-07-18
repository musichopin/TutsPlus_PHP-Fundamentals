<!doctype html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Super Globals</h1>
	<!-- we used htmlspecialchars when grabbing the info from the query string -->
	<?php echo htmlspecialchars($_GET['name']); ?>
	<!-- get is not used for updating database, but fetching data. for simple transfer that are completely safe to get (query strings) is preffered over other methods (databases, caching to text file, sessions).  -->
</body>
</html>