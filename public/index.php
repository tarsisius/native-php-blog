<?php

require_once '../app/config/config.php';
require_once '../app/config/database.php';
require_once '../app/libraries/utils.php';
function __autoload($class) {
    require_once '../app/'.CORE . $class .".php";
    
}
Session::init();
$bootstrap = new Bootstrap();
