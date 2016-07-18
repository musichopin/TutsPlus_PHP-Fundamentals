<?php 
require 'functions.php';

$registered_users = get_registered_users();
// print_r($registered_users);

require 'registered_users.tmpl.php';
/*we can require at the end since we don't call this tmpl file's function, 
registered_users.php kind of becomes like a middleman for registered_users.tmpl.php to reach get_registered_users() at functions.php
*/