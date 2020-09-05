<?php  
	switch ($_SESSION['role']){
		case 1:
			require_once APP_ROUTE . '/views/admin/index.php';
			break;
		case 2: 
			require_once APP_ROUTE . '/views/user/index.php';
			break;
		default:
			require_once APP_ROUTE . '/views/public/home.php';
	}	 
?>