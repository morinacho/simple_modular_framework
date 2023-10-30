<?php  
	#Data base access config
	define('DB_MANAGEMENT', 'pgsql');		     # Put the system data base management to use
	define('DB_HOST', 'localhost'); 	 		 	 # Put the name of the host
	define('DB_PORT','5432');					 # Put the port if you use postgresql
	define('DB_USER', 'uadmin'); 	 		 		 # Put the username
	define('DB_PASSWORD', 'password'); 					 # Put the password
	define('DB_NAME', 'uplatform');		 # Put the data base name
	
	# App route
	define('APP_ROUTE', dirname(dirname(dirname(__FILE__))));

	# URL route 
	define('URL_ROUTE', 'http://localhost/nup/');
	#define('URL_ROUTE', $_SERVER['SERVER_NAME']. '/'); # Put the url route of your site
	
?>