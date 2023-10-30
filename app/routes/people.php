<?php 
    use app\core\Router; 
    use app\entities\users\controller\Users;

    
    Router::get('/users/index', [Users::class, 'index']);
    
    if(isset($_SESSION['token']) and $_SESSION['rol'] = 1){
    }

?>