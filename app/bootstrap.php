<?php
//loading the config
require_once '../app/config/config.php';

// autoload the libraries
spl_autoload_register(function ($className) {
    require_once "../app/libraries/$className.php";
});
