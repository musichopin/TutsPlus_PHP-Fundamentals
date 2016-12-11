<?php

require 'functions.php';
require 'db.php';

// hem index.php hem de single.php ortak barındırdığı için farklı dosyaya konuldu
// Connect to the db
$conn = Blog\DB\connect($config); // we could also redirect to another page
// tepede "use Blog\DB;" demek yerine burada Blog/DB denildi (1 kere kullanıldığı için)
if ( !$conn ) die('Problem connecting to the db.');
