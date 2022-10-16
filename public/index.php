<?php

// Load Config
require_once '../app/config/config.php';

// Autoload core libraries
spl_autoload_register( function($classname) {
    require_once '../app/libraries/' . $classname . '.php';
} );


$init = new Core;

?>