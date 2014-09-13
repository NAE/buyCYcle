<?php

	require_once('php/db_connect.php');
	
	if (isset($_GET['action'])) {
		$action = strtolower($_POST['action']);
		
	}
	elseif (isset($_POST['action'])) {
		$action = strtolower($_GET['action']);
		
		}
		
	if (isset($_GET['station_ID'])) {
		$currentSlot = $_POST['station_ID'];
		
	}
	elseif (isset($_POST['station_ID'])) {
		$currentSlot = $_GET['station_ID'];
		
		}
		
	else {
		$currentSlot = '';
	}
	include($action'.php');
	

?>