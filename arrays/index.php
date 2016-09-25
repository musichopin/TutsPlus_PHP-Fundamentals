<?php
// $tuts_sites = array('nettuts+', 'psdtuts+', 'webdesigntuts+', 'wptuts+', 'mobiletuts+'); 
// $tuts_sites = ['nettuts+', 'psdtuts+', 'webdesigntuts+', 'wptuts+', 'mobiletuts+']; // only in PHP 5.4+

// 2 alt:
// var_dump($tuts_sites);
// print_r($tuts_sites);

// Associative Array: we are trying to connect names to the urls
$tuts_sites = array(
	'nettuts' => 'http://net.tutsplus.com',
	'psdtuts' => 'http://psd.tutsplus.com',
	'wptuts' => 'http://wp.tutsplus.com',
);

?>
<!doctype html>
<html>
<head>
	<title>Arrays</title>
</head>
<body>
	<h1>Tuts+ Sites</h1>
	<ul>
		<?php 
		foreach($tuts_sites as $name => $url) : ?>
			<li>
				<a href="<?= $url; ?>"><?= $name; ?></a>
			</li>
		<?php endforeach ?>

		<!-- ***delete below to display on web browser*** -->

		<!-- foreach($tuts_sites as $name => $url) { ?>
			<li>
				<a href="<?= $url; ?>"><?= $name; ?></a>
			</li>
		<?php } ?>  -->
		
		<!-- <?php 
		foreach($tuts_sites as $name => $url) {
			echo "<li><a href='$url'>" . ucwords($name) . "+</a></li>";
		}
		?> -->

		<!-- <?php 
		foreach($tuts_sites as $site) {
			echo "<li>$site</li>";
		}
		?> -->
	</ul>
</body>
</html>