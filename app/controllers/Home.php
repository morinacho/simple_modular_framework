<?php   

	class Home extends Controller{
		
		public function __construct() {}

		public function index(){
			if(!isset($_SESSION['role'])){
				$this->view('index'); 
			}
			else{
				echo $_SESSION['role'];
				switch($_SESSION['role']){
					case 1:
						$this->view('admin/index');
						break;
					case 2:
						$this->view('user/index');
						break; 
				}  
			} 
		}
	} 
?>