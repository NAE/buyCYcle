<?php
	require_once('./db_connect.php');
		
	if (isset($_POST['action'])) {
		$action = strtolower($_POST['action']);
		
	}	
	elseif (isset($_GET['action'])) {
		$action = strtolower($_GET['action']);
		
	}
	else {
		$action = 'blank';
	}
		
	if (isset($_POST['station_ID'])) {
		$currentRack = $_POST['station_ID'];
		echo "<br />".$currentRack;
		
		}	
	elseif (isset($_GET['station_ID'])) {
		$currentRack = $_GET['station_ID'];
		
	}
	else {
		$currentRack = '';
	}
	
	echo $action;

	include($action.'.php');
	

?>