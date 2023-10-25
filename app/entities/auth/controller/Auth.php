<?php
    namespace app\entities\auth\controller;

    use app\core\Controller;

    class Auth extends Controller{
        
        private $userModel;

        public function __construct(){
			
			session_start(); 
		}

        public function login(){
			if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])){
				if(isset($_POST['user-email']) && isset($_POST['user-password'])){
					$email = $_POST['user-email'];
					$pass  = $_POST['user-password'];
					$user  = $this->userModel->getByEmail($email);
					
					if(!empty($user) && password_verify($pass, $user->contrasena)){
						$_SESSION['username'] = "$user->nombres $user->apellido";
						$_SESSION['rol']      = $user->rol_id;
						$_SESSION['userdoc']  = $user->documento;
						header("Location:".URL_ROUTE);	
					}
				}
			} 		
		} 

        public function logout(){
			session_unset();
            session_destroy(); 
		}

        
    }
?>