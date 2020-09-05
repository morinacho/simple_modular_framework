<?php 
	class Controller{
		# Load model
		public function model($model){
			require_once '../app/models/' . $model . '.php';
			return new $model();
		}

		# Load view
		public function view($view, $param = []){
			session_start();
			require_once APP_ROUTE . '/views/modules/header.php'; 

			if(Controller::authenticated()){
				if (file_exists('../app/views/' . $view . '.php')){
					require_once '../app/views/' . $view . '.php';
				}
				else{
					require_once '../app/views/public/404.php';
				}
			}
			else{
				require_once '../app/views/public/login.php';
			}
			
			require_once APP_ROUTE . '/views/modules/footer.php'; 
		}

		public static function authenticated(){
			return (isset($_SESSION['user']));
		}
	}
?>