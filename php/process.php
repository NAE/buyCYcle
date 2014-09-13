<?php

	require_once('php/db_connect.php');
	
	if (isset($_GET['action'])) {
		$action = strtolower($_POST['action']);
		
	}
	elseif (isset($_POST['action'])) {
		$action = strtolower($_GET['action']);
		
		}
		
	if (isset($_GET['station_ID'])) {
		$currentRack = $_POST['station_ID'];
		
	}
	elseif (isset($_POST['station_ID'])) {
		$currentRack = $_GET['station_ID'];
		
		}
		
	else {
		
	}
	include($action'.php');
	

?>