<?php
	$rack = $_POST['rack'];
	$slot = $_POST['slot'];
	
	$sql = "UPDATE Slots SET hasbike=0, unlock=0 WHERE rackid='" . $rack . "' AND slotnum='" . $slot . "';";
	$qry->execute();
	$all = $qry->fetchAll(PDO::FETCH_BOTH);

?>
