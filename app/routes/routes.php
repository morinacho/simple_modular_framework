<?php
    use app\core\Router;
    use app\entities\main\controller\Main;


    Router::get('/', [Main::class, 'index']);

    Router::get('/contact', [Main::class, 'contact']); 

    Router::get('/crear/:slug', function($slug){
        return "slug $slug bitchs";
    });

    Router::dispatch();
?>