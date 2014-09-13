<?php

	require_once('php/db_connect.php');
	
	if (isset($_GET['action'])) {
		$action = strtolower($_GET['action']);
		
	}
	elseif (isset($_POST['action'])) {
		$action = $_POST['action'];
		//$action = strtolower($_POST['action']);
		
		}
	else {
		$action = "blank";
	}
		
	if (isset($_GET['station_ID'])) {
		$currentRack = $_GET['station_ID'];
		
	}
	elseif (isset($_POST['station_ID'])) {
		$currentRack = $_POST['station_ID'];
		
		}
		
	else {
		$currentRack = '';
	}
	
	echo $action;
	include($action.'.php');
	

?>