<?php

	require_once('db_connect.php');

	$rack = $_POST['rack'];
	$slot = $_POST['slot'];

	$qry = $db->prepare("SELECT * FROM Slots WHERE `slotnum`='" . $slot . "' AND `rackid`='" . $rack . "' AND `hasbike`=0 AND `unlock`=1");
	$qry->execute();
	$all = $qry->fetchAll(PDO::FETCH_BOTH);
	
	if(count($all) < 1){
		//there were no rows with that slot and rack that were empty
		return;
	}
	
	$qry = $db->prepare("UPDATE `Slots` SET `hasbike`=1 WHERE `rackid`='" . $rack . "' AND `slotnum`='" . $slot . "';");
	$qry->execute();

?>
