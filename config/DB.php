<?php
//api url filter
if(strpos($_SERVER['REQUEST_URI'],"DB.php")){
    require_once 'Utils.php';
    PlainDie();
}
include 'inc.config.php';

$conn = new mysqli($config['db']['game']['host'], $config['db']['game']['user'], $config['db']['game']['pass'], $config['db']['game']['name']);

if($conn->connect_error != null){
    die($conn->connect_error);
}