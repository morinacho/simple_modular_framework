<?php 
	
	class Controller{

		# Load model
		public function model($model){
			require_once '../app/models/' . $model . '.php';
			return new $model();
		}

		# Load view
		public function view($view, $param = []){
			if (file_exists('../app/views/' . $view . '.php')){
				require_once '../app/views/' . $view . '.php';
			}
			else{
				#require_once '../app/views/modules/404/index.html';
				die('ERROR');
			}
		}

		public static function authenticated(){
			session_start();
			return (isset($_SESSION['user']));
		}
	}

?>