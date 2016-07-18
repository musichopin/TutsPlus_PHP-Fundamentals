<?php
session_start();
/*session_start must come before every other session statements*/

session_destroy();
$_SESSION = array(); /*we reinitialize the session super global array*/

// delete the cookie. (Next lesson)

header('Location: login.php'); /*redirects*/