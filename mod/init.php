
<?php

//api url filter
if(strpos($_SERVER['REQUEST_URI'],"init.php")){
    require_once 'Utils.php';
    PlainDie();
}

set_include_path(get_include_path() . PATH_SEPARATOR . 'phpseclib');

include '../config/DB.php';
include '../config/inc.functions.input.php';
include 'Utils.php';
include 'Crypter.php';