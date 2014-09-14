<?php
	require_once('db_connect.php');

	$rack = $_POST['rack'];
	$slot = $_POST['slot'];
	
	
	$qry = $db->prepare("UPDATE Slots SET `hasbike`=0 WHERE rackid='" . $rack . "' AND slotnum='" . $slot . "';");
	$qry->execute();

?>
