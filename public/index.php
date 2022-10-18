<?php

// Load Config
require_once '../app/config/config.php';

// Load Helpers
require_once('../app/helpers/url_helper.php');
require_once('../app/helpers/session_helper.php');

// Autoload core libraries
spl_autoload_register( function($classname) {
    require_once '../app/libraries/' . $classname . '.php';
} );


$init = new Core;

?>