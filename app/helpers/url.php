<?php

	function redirect($page){
		header('location:' . URL_ROUTE . $page);
	}

?>