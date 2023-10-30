<?php
    use app\core\Router; 
    
    require_once 'auth.php';
    require_once 'main.php';
    require_once 'people.php';
    
    Router::dispatch(); 
    
?>