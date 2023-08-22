<?php

ob_start(); // enable output buffering whenever this file is included

// File path constants
define('PRIVATE_PATH', dirname(__FILE__));
define('PROJECT_PATH', dirname(PRIVATE_PATH));
define('PUBLIC_PATH', PROJECT_PATH . '/public');
define('SHARED_PATH', PRIVATE_PATH . '/shared');

// Base URL path constant
// Assign the root URL to a PHP constant
// * Do not need to include the domain
// * Use same document root as webserver
define("WWW_ROOT", '');

require_once('functions.php');
require_once('database.php');

$db = dbConnect();
