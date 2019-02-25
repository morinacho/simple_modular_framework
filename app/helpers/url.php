<?php

	function redirect($page){
		header('Location:' . URL_ROUTE . $page);
	}

?>