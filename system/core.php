<?php
function __autoload($classname){
    if (strpos($classname,"Controller") !== false){
        $file = str_replace("Controller","",$classname);
        $file = strtolower($file);
        require_once ("./mvc/controller/$file.php");
        return true;
    }
}
