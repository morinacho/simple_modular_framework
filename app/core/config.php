<?php  
	#Data base access config
	define('DB_MANAGEMENT', 'pgsql');		     # Put the system data base management to use
	define('DB_HOST', '10.18.120.34'); 	 		 	 # Put the name of the host
	define('DB_PORT','5432');					 # Put the port if you use postgresql
	define('DB_USER', 'postgres'); 	 		 		 # Put the username
	define('DB_PASSWORD', 'poimnbqaz.,'); 					 # Put the password
	define('DB_NAME', 'guarani3');		 # Put the data base name
	
	# App route
	define('APP_ROUTE', dirname(dirname(dirname(__FILE__))));

	# URL route 
	define('URL_ROUTE', 'http://localhost/nup/');
	#define('URL_ROUTE', $_SERVER['SERVER_NAME']. '/'); # Put the url route of your site

	# Site name
	define('SITENAME', 'Entradas - Salidas');  # Put the name of the site

?>