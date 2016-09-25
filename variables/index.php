<html>
<head>
	<title></title>
</head>
<body>
	<h1>My Website</h1>
	<?php 
	/*Query string:*/
	$name = $_GET['name'];
	// the reason why we use php with html is, because of its variables, functions, arrays, conditions and loops
	// We shouldn’t blindly switch single and double quotes without a reason
	echo 'Hello ' . $name;
	echo "<br>";
	echo "Hello $name";
	?>	
	
	<!-- 1st method -->
	<?php 
	$name = "Jeffrey Way";

	echo '<p>Hello ' . $name . '</p>';
	echo "<p>Hello $name</p>";
	?>	 

	<!-- 2nd method -->
	<?php $name = "Jeffrey Way";?>

	<p> <?php echo 'Hello ' . $name ?> </p>
	<p> <?php echo "Hello $name" ?> </p>
	<!-- no need to put semi-colon for they are the last statements before the closing php tag -->

</body>
</html>