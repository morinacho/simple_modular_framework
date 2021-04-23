<?php  
	switch ($_SESSION['role']){
		case 1:
			require_once APP_ROUTE . '/view/admin/index.php';
			break;
		case 2: 
			require_once APP_ROUTE . '/view/user/index.php';
			break;
		default:
			require_once APP_ROUTE . '/view/public/home.php';
	}	 
?>