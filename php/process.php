<?php

	require_once('php/db_connect.php');
	
	if (isset($_GET['action'])) {
		$action = strtolower($_POST['action']);
		
	}
	elseif (isset($_POST['action'])) {
		$action = strtolower($_GET['action']);
		
		}
		
		
	include($action'.php');
	

?>