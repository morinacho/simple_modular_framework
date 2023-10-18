<?php
    spl_autoload_register(function($class){
        $route = '../' . str_replace("\\", "/", $class) . ".php";
        
        file_exists($route) ? require_once $route : die("Class $class not found");
    });
?>