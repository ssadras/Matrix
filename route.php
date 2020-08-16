<?php
require_once "system/loader.php";

$url = $_SERVER["REQUEST_URI"];
$url = substr($url,1);
$url = explode("/",$url);

$classname = ucfirst($url[1])."Controller";
$method= $url[2];

$controller=new $classname();
$controller->$method();