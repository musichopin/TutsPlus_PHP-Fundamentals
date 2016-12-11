<?php
require 'functions.php';
require 'config.php';
/*readability and reusability: functions'daki built-in fonksiyonlar başka table tarafından da kullanılabilmesi için ayrı sayfaya konuldu ve built-in fonksiyonlar fonksiyona yerleştirildi. 
html kısmını (output) barındıran index.view.php'nin farklı dosyada olmasına dikkat.
server log-in bilgilerini barındıran config.php'nin farklı sayfada olmasına dikkat  */

/*"mysqli_connect" denebilirdi*/
$conn = connect($config['DB_HOST'],
				$config['DB_USERNAME'],
				$config['DB_PASSWORD'],
				'practice');

// queries the db and returns a set of rows based on table. ($results is an array)
$results = query('SELECT * FROM users ORDER BY user_name asc LIMIT 300', $conn);
/*practice db'deki users table'daki tüm rowlar sorgulanıyor
ve rowlar return ediliyor*/

require 'index.view.php';


// aşağıdaki eklenince 2 kere print ederdi (mantık için ekledim): 
// require 'index.view.php';
