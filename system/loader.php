<?php
session_start();
error_reporting(E_ALL);
ini_set('display_startup_errors',true);
ini_set('ignore_repeated_errors',true);
ini_set('display_errors',true);
ini_set('log_errors',true);
ini_set('error_log','system/errors.log');
ini_set('log_errors_max_len',1024);
ini_set('date.timezone',"Asia/Tehran");
require_once ("common.php");
require_once ("config.php");
require_once("db.php");
require_once ("core.php");
require_once ("view.php");

function Domain_R (){
    global $config;
    return $config["domain"];
}

function Domain_E (){
    global $config;
    echo $config["domain"];
}