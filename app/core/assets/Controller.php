<?php 
	class Controller{
		protected $class;

		public function __construct(){
			$this->class = strtolower(get_class($this));	
		}

		# Load model
		public function model($model, $class = ""){
			if (!strcmp($class, "")) $class = $this->class;
			require_once '../app/'. $class .'/model/' . $model . '.php';
			return new $model();
		}

		# Load view
		public function view($view, $param = []){
			session_start();
			require_once APP_ROUTE . '/main/view/header.php'; 

			if(Controller::authenticated()){
				if (file_exists('../app/'. $this->class  .'/view/' . $view . '.php')){
					require_once '../app/'. $this->class  .'/view/' . $view . '.php';
				}
				else{
					require_once APP_ROUTE . '/main/view/404.php';
				}
			}
			else{
				require_once APP_ROUTE . '/main/view/login.php';
			}

			require_once APP_ROUTE . '/main/view/footer.php'; 
		}

		public static function authenticated(){
			return (isset($_SESSION['username']));
		}
	}
