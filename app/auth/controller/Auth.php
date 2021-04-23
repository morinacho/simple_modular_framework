<?php  
	class Auth extends Controller{
		private $userModel;

		public function __construct(){
			$this->userModel = $this->model('User', 'users');
			session_start(); 
		}

		public function login(){
			if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])){
				if(isset($_POST['user-email']) && isset($_POST['user-password'])){
					$email = $_POST['user-email'];
					$pass  = $_POST['user-password'];
					$user  = $this->userModel->getByEmail($email);
					
					if(!empty($user) && password_verify($pass, $user->user_password)){
						$_SESSION['username'] = "$user->user_name $user->user_lastname";
						$_SESSION['userpic']  = "$user->user_img";	

						$typeUser=$user->user_type_id;
						switch ($typeUser) {
							case '1':
								redirect('home');
								break;
							
							default:
							redirect('login');
								break;
						}
					} 
					else{ 
						redirect('login');
					}
				}
				else{
					redirect('login');
				}
			}			
		}

		public function register(){
			if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['register'])){
				$options =  ['cost' => 12];
				$pass    =  password_hash(trim($_POST['user-password']), PASSWORD_BCRYPT, $options);
				$param   =  [
					'user-nick' 	=> trim($_POST['user-nick']),
					'user-email' 	=> trim($_POST['user-email']),
					'user-password' => $pass
				];
				if($this->userModel->userRecord($param)){
					redirect('home');
				}
				else{
					die("FATAL ERROR");
				}
			}
			else{
				$param = [
					'user-name' 	=> '',
					'user-lastname' => '',
					'user-phone' 	=> '',
					'user-address' 	=> ''
				];
			}

		}

		public function logout(){
			session_unset();
        	session_destroy();
        	redirect('home');
		}
	}

?>