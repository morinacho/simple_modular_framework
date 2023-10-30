<?php 
    use app\core\Router; 
    use app\entities\auth\controller\Auth;

    Router::get('/sign_in', [Auth::class, 'sign_in']);

    Router::post('/login', [Auth::class, 'login']);
    
    Router::get('/logout', [Auth::class, 'logout']);

    Router::get('/forgot_password', [Auth::class, 'forgot_password']);

?>