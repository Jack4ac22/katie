<?php
//loading the config
require_once '../app/config/config.php';

//load helper
require_once '../app/helpers/url_helper.php';
require_once '../app/helpers/session_helper.php';


// autoload the libraries
spl_autoload_register(function ($className) {
    require_once "../app/libraries/$className.php";
});
