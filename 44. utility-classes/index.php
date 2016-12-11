<?php
require 'classes/html.php';
?>
<!doctype html>
<html>
<head>
	<title></title>
</head>
<body>

	<?= HTML::link('my-site/TutsPlus_PHP-Fundamentals/utility-classes/index.php', 'About Us'); ?> <!-- relative url -->
	<?= HTML::ul(array('item1', 'item2', 'item3')); ?>
	<?= HTML::image('http://d2o0t5hpnwv4c1.cloudfront.net/2100_node/preview.png', 'Node.js'); ?>
	<!-- do not use hot links for images in normal circumstances -->

</body>
</html>
