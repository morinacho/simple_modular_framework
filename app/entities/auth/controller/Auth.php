<?php
    namespace app\entities\auth\controller;

    use app\core\Controller;
	use app\entities\auth\model\Auth as AuthModel;

    class Auth extends Controller{
        
        private $authModel;

        public function __construct(){
			parent::__construct();
			$this->authModel = new AuthModel();
			session_start(); 
		}

		public function sign_in(){
            return $this->view('login',['title' => 'Nup - Sign in']);
        }

        public function login(){ 
			if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])){
				if(isset($_POST['username']) && isset($_POST['user-password'])){
					$user  = $this->authModel->getAuth($_POST['username']);
					
					if(!empty($user) && password_verify($_POST['user-password'], $user->password)){
						$_SESSION['username'] = $user->username;
						$_SESSION['rol']      = $user->user_rol_id;
						$_SESSION['token']    = '$user->token';
						
						header("Location:".URL_ROUTE);	
					}
					else{
						echo "datos incorrectos";
					}
				}
			} 		
		}

        public function logout(){
			session_unset();
            session_destroy(); 
			header("Location:".URL_ROUTE);	
		}

		public function forgot_password(){
			return $this->view('forgot_password', ['title' => 'Nup - Forgot you password']);
		}
    }
?>