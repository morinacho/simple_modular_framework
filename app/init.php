<?php 

	# Load assets
	require_once 'core/config/config.php';
	require_once 'core/helpers/url.php';

	# Autoload
	spl_autoload_register(function($className){
		require_once 'core/assets/' . $className . '.php';
	}); 
 
?>