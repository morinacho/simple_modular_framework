<?php  

	class Auth extends Controller{
		private $userModel;

		public function __construct(){
			$this->userModel = $this->model('User');
			session_start(); 
		}

		public function login(){
			if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])){
				if(isset($_POST['user-email']) && isset($_POST['user-password'])){
					$email = $_POST['user-email'];
					$pass  = $_POST['user-password'];
					$user  = $this->userModel->getByEmail($email);
					
					if(!empty($user) && password_verify($pass, $user->user_password)){
						$_SESSION['user'] = $user->user_nick;
						
						switch ($user->role_id){
							case 1:
								$_SESSION['role'] = 'admin';
								redirect('home');
								break;
							case 2:
								$_SESSION['role'] = 'normal';
								redirect('home');
								break;
						}
					}
					else{
						redirect('home');
					}
				}
				else{
					redirect('home');
				}
			}			
		}

		public function register(){

		}

		public function logout(){
			session_unset();
        	session_destroy();
        	redirect('home');
		}
	}

?>