<?php

require 'functions.php';
require 'db.php';

// Connect to the db
$conn = Blog\DB\connect($config);
// $config db'deki $config'dir
if ( !$conn ) die('Problem connecting to the db.');
